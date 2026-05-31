# Typing Speed Test Website

A dynamic typing speed test website built with HTML, CSS, and JavaScript.

## Features

- Random text selection from a pool of sample texts
- Real-time WPM (Words Per Minute) calculation
- Accuracy percentage
- Countdown timer (60 seconds)
- Visual feedback for correct and incorrect characters
- Start and reset functionality

## How to Use

1. Open `index.html` in a web browser.
2. Click the "Start Test" button to begin.
3. Start typing the displayed text in the textarea.
4. The timer will count down from 60 seconds.
5. Your WPM and accuracy will update in real-time.
6. When time runs out, the test ends automatically.
7. Click "Reset" to try again with a new random text.

## Files

- `index.html`: Main HTML structure
- `styles.css`: CSS styling
- `script.js`: JavaScript logic for the typing test

## Customization

You can add more texts to the `texts` array in `script.js` to provide more variety.

To change the test duration, modify the `timeLeft` variable in the `init` function.