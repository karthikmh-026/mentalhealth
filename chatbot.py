from flask import Flask, render_template, request, url_for
import nltk
from nltk.chat.util import Chat, reflections

pairs = [
    [
        r"my name is (.*)",
        ["Hello %1, How are you today?"]
    ],
    [
        r"hi|hey|hello",
        ["Hello", "Hey there"]
    ],
    [
        r"what is your name?",
        ["I am a chatbot. You can call me your friend."]
    ],
    [
        r"how are you ?",
        ["I'm good. How about you?"]
    ],
    [
        r"sorry (.*)",
        ["No problem"]
    ],
    [
        r"quit",
        ["Bye! Take care."]
    ]
]

chatbot = Chat(pairs, reflections)

app = Flask(__name__)
@app.route("/")
def home():
    return render_template("chatbot.html")

@app.route("/get_response", methods=["POST"])
def get_response():
    user_input = request.form["user_input"]
    response = chatbot.respond(user_input)
    return response

if __name__ == "__main__":
    print("Chatbot: Hi, how can I help you today?")
    app.run()
    

