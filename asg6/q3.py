# How many distinct product categories are in the data file?

from mrjob.job import MRJob
from mrjob.protocol import JSONValueProtocol
from mrjob.step import MRStep

productCount = 0

class ProductCategories(MRJob):

    # write output as JSON 
    OUTPUT_PROTOCOL = JSONValueProtocol

    def map_categories(self, _, line):
        line_cols = line.split(',')
        # map categories to None
        yield line_cols[1], None

    def combine_categories(self, category, _):
        # combine categories 
        yield category, None

    def reduce_categories(self, category, _):
        # send all (category, _) pairs to the same reducer.
        yield None, (category, None)
    
    def find_total_categories(self, _, category_none_pairs):
        global productCount
        # lets get the categories and increment the global counter
        # to find how many there are.
        for product in category_none_pairs:
            productCount = productCount + 1
            yield None, product[0]
        
    def steps(self):
        return [
            MRStep(mapper=self.map_categories,
                    combiner=self.combine_categories,
                    reducer=self.reduce_categories
                    ),
            MRStep(reducer=self.find_total_categories)
        ]

if __name__ == '__main__':
    print("\nDistinct Product Categories:\n")
    ProductCategories.run()
    print ("\nTotal Amount of Categories: {}\n").format(str(productCount))