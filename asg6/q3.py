# How many distinct product categories are in the data file?

from mrjob.job import MRJob
from mrjob.protocol import JSONValueProtocol
from mrjob.step import MRStep

class ProductCategories(MRJob):

    # write output as JSON 
    OUTPUT_PROTOCOL = JSONValueProtocol

    def map_categories(self, _, line):
        line_cols = line.split(',')
        # map categories to None
        yield line_cols[1], 1

    def combine_categories(self, category, _):
        # combine categories 
        yield category, 1

    def reduce_categories(self, category, _):
        # send all (category, _) pairs to the same reducer.
        yield None, (category, 1)
    
    def find_total_categories(self, _, category_pairs):
        # lets get the categories by summing up the pairs
        # to find how many there are.
        total = sum(x[1] for x in category_pairs)
        
        yield None, total

    def steps(self):
        return [
            MRStep(mapper=self.map_categories,
                    combiner=self.combine_categories,
                    reducer=self.reduce_categories
                    ),
            MRStep(reducer=self.find_total_categories)
        ]

if __name__ == '__main__':
    print("\nDistinct Product Categories: ")
    ProductCategories.run()