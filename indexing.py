def index_sentences(input_file, output_file):
    # Open the file and read all lines
    with open(input_file, 'r', encoding='utf-8') as f:
        sentences = f.readlines()

    # Index each sentence
    indexed_sentences = [(i + 1, sentence.strip()) for i, sentence in enumerate(sentences)]

    # Print or write the indexed sentences
    with open(output_file, 'w', encoding='utf-8') as f:
        for index, sentence in indexed_sentences:
            f.write(f"{index}: {sentence}\n")

    # Optionally, print the indexed sentences to the console
    for index, sentence in indexed_sentences:
        print(f"{index}: {sentence}")

# Usage
input_file = 'shuffled_output.txt'
output_file = 'indexed_sentences.txt'

index_sentences(input_file, output_file)
