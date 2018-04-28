# What is the payment mode that had the highest total amount of gross revenue?

from mrjob.job import MRJob
from mrjob.step import MRStep

class PaymentMode(MRJob):
    def map_paymode_amount(self, _, line):
        # map payment modes with their amounts
        line_cols = line.split(',')
        yield line_cols[3], float(line_cols[2])

    def combine_paymode_amount(self, paymode, amount):
        # sum the amounts we've seen so far
        yield paymode, sum(amount)
    
    def reduce_paymode_amount(self, paymode, amount):
        # send all (paymode, amount) pairs to the same reducer.
        yield None, (paymode, sum(amount))

    def find_max_paymode(self, _, paymode_amount_pairs):
        # each item of paymode_amount_pairs is (paymode, amount)
        # so we need to use a lambda function to pick the amount
        max_pair = max(paymode_amount_pairs, key=lambda x:x[1])
        
        yield max_pair[0], round(max_pair[1], 2)

    def steps(self):
        return [
            MRStep(mapper=self.map_paymode_amount,
                    combiner=self.combine_paymode_amount,
                    reducer=self.reduce_paymode_amount
                    ),
            MRStep(reducer=self.find_max_paymode)
        ]

if __name__ == '__main__':
    print("\nPayment Method with the highest amount of gross revenue:\n")
    PaymentMode.run()
    print("")