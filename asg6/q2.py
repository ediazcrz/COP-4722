# Which are the top three cities that had the most total amount of gross revenue?

from mrjob.job import MRJob
from mrjob.step import MRStep

class TopCities(MRJob):
    def map_city_revenue(self, _, line):
        line_cols = line.split(',')
        # map cities with their revenue streams
        yield line_cols[0], float(line_cols[2])

    def combine_city_revenue(self, city, revenue):
        # sum the revenue streams we've seen so far
        yield city, sum(revenue)

    def reduce_city_revenue(self, city, revenue):
        # send all (city, revenue) pairs to the same reducer.
        yield None, (city, sum(revenue))
    
    def find_top_three_cities(self, _, city_revenue_pairs):
        # sort city_revenue_pairs by their revenue and slice off the bottom three
        # used a lambda function to sort by the revenue
        city1, city2, city3 = sorted(city_revenue_pairs, key=lambda x:x[1])[-3:]

        yield city3[0], round(city3[1], 2)
        yield city2[0], round(city2[1], 2)
        yield city1[0], round(city1[1], 2)

    def steps(self):
        return [
            MRStep(mapper=self.map_city_revenue,
                    combiner=self.combine_city_revenue,
                    reducer=self.reduce_city_revenue
                    ),
            MRStep(reducer=self.find_top_three_cities)
        ]    
if __name__ == '__main__':
    print("\nTop three cities with the highest amount of gross revenue:\n")
    TopCities.run()
    print("")

