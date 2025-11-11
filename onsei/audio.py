# generate_audio.py
import sys
from gtts import gTTS
import os

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Usage: python generate_audio.py <text> <language>")
        sys.exit(1)

    text = sys.argv[1]
    lang = sys.argv[2]
    file_name = "output.mp3" # ここでは固定ファイル名とする（実際にはユニークな名前が良い）

    try:
        tts = gTTS(text=text, lang=lang, slow=False)
        tts.save(file_name)
        print(f"File created: {file_name}")
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)