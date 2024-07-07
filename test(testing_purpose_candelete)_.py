import nltk
from nltk.tokenize import word_tokenize
from nltk.tag import pos_tag
from nltk.chunk import RegexpParser

# Input sentence
nltk.download('punkt')
nltk.download('averaged_perceptron_tagger')
nltk.download('maxent_ne_chunker')
sentence = "The cat chased the mouse under the table."

# Tokenize the input sentence
tokens = word_tokenize(sentence)

# Assign part-of-speech tags to each token
pos_tags = pos_tag(tokens)
print(type(pos_tags))
for i in pos_tags:
    if i[1]=="NN":
     print("noun: "+i[0])

# Define patterns for NP, VP, and PP using regular expressions
chunk_patterns = r"""
    NP: {<DT>?<JJ>*<NN>} # Chunk sequences of DT, JJ, and NN
    VP: {<VB.*><DT>?<JJ>*<NN|PR.*>+} # Chunk sequences of VB, DT, JJ, NN, PRP, PRP$, etc.
    PP: {<IN><NP>} # Chunk prepositional phrases
"""

# Create a chunk parser using the defined patterns
chunk_parser = RegexpParser(chunk_patterns)

# Apply chunking to the part-of-speech tagged tokens
parsed_tree = chunk_parser.parse(pos_tags)

# Display the parsed tree
print(parsed_tree)
