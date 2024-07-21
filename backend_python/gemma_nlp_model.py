import openai
import os

# Load API key from environment variable for security
openai.api_key = "sk-proj-nVsVKyydiIDdkdoJOSgXT3BlbkFJr2aZwIxOZ8z7y3ZMbpae"

def get_openai_response(prompt):
    try:
        response = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages=[
                {"role": "system", "content": "You are a helpful assistant."},
                {"role": "user", "content": prompt},
            ]
        )
        return response.choices[0].message['content']
    except openai.error.OpenAIError as e:
        return f"Error: {str(e)}"

# Example usage
if __name__ == "__main__":
    user_prompt = "What is the capital of France?"
    print(get_openai_response(user_prompt))


# from transformers import AutoTokenizer, AutoModelForSequenceClassification

# model_name = 'bert-base-uncased'

# tokenizer = AutoTokenizer.from_pretrained(model_name)
# model = AutoModelForSequenceClassification.from_pretrained(model_name)
# input_text = 'This is text to be processed'
# encoded_text = tokenizer(input_text, truncation=True, padding=True, return_tensors='pt')
# predictions = model(encoded_text)
# predicted_label = predictions[0][0]

# print(predicted_label)