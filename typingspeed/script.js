const textElement = document.getElementById('text');
const inputElement = document.getElementById('input');
const wpmElement = document.getElementById('wpm');
const accuracyElement = document.getElementById('accuracy');
const timeElement = document.getElementById('time');
const startButton = document.getElementById('start');
const resetButton = document.getElementById('reset');

let texts = [
    "The quick brown fox jumps over the lazy dog. This is a sample text for typing speed test. Practice makes perfect.",
    "In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell.",
    "It was the best of times, it was the worst of times, it was the age of wisdom, it was the age of foolishness.",
    "To be or not to be, that is the question. Whether 'tis nobler in the mind to suffer the slings and arrows of outrageous fortune.",
    "All happy families are alike; each unhappy family is unhappy in its own way. Everything was in confusion in the Oblonskys' house."
];

let currentText = '';
let startTime;
let timer;
let timeLeft = 60;
let isTestActive = false;

function init() {
    currentText = texts[Math.floor(Math.random() * texts.length)];
    textElement.textContent = currentText;
    inputElement.value = '';
    inputElement.disabled = true;
    wpmElement.textContent = '0';
    accuracyElement.textContent = '100';
    timeElement.textContent = '60';
    timeLeft = 60;
    isTestActive = false;
    clearInterval(timer);
}

function startTest() {
    if (isTestActive) return;
    isTestActive = true;
    inputElement.disabled = false;
    inputElement.focus();
    startTime = new Date().getTime();
    timer = setInterval(updateTimer, 1000);
}

function updateTimer() {
    timeLeft--;
    timeElement.textContent = timeLeft;
    if (timeLeft <= 0) {
        endTest();
    }
}

function endTest() {
    clearInterval(timer);
    inputElement.disabled = true;
    isTestActive = false;
    calculateStats();
}

function calculateStats() {
    const endTime = new Date().getTime();
    const timeElapsed = (endTime - startTime) / 1000 / 60; // in minutes
    const typedText = inputElement.value;
    const correctChars = getCorrectChars(typedText, currentText);
    const totalChars = currentText.length;
    const accuracy = Math.round((correctChars / totalChars) * 100);
    const wpm = Math.round((typedText.length / 5) / timeElapsed);

    wpmElement.textContent = wpm;
    accuracyElement.textContent = accuracy;
}

function getCorrectChars(typed, original) {
    let correct = 0;
    const minLength = Math.min(typed.length, original.length);
    for (let i = 0; i < minLength; i++) {
        if (typed[i] === original[i]) correct++;
    }
    return correct;
}

function updateDisplay() {
    if (!isTestActive) return;
    const typedText = inputElement.value;
    let displayText = '';
    for (let i = 0; i < currentText.length; i++) {
        if (i < typedText.length) {
            if (typedText[i] === currentText[i]) {
                displayText += `<span class="correct">${currentText[i]}</span>`;
            } else {
                displayText += `<span class="incorrect">${currentText[i]}</span>`;
            }
        } else {
            displayText += currentText[i];
        }
    }
    textElement.innerHTML = displayText;
    calculateStats();
}

inputElement.addEventListener('input', updateDisplay);
startButton.addEventListener('click', startTest);
resetButton.addEventListener('click', init);

init();