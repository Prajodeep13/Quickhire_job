// Typing effect
const phrases = [
  "Find your dream job",
  "Hire top talent",
  "Build your future with QuickHire"
];
let currentPhraseIndex = 0;
let charIndex = 0;
let typingForward = true;
const typingDiv = document.getElementById("typingEffect");

function typeLoop() {
  const phrase = phrases[currentPhraseIndex];
  if (typingForward) {
    charIndex++;
    if (charIndex === phrase.length + 1) typingForward = false;
  } else {
    charIndex--;
    if (charIndex === 0) {
      typingForward = true;
      currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
    }
  }
  typingDiv.textContent = phrase.substring(0, charIndex);
  setTimeout(typeLoop, typingForward ? 150 : 100);
}
typeLoop();

// Theme toggle
document.getElementById("themeToggle").addEventListener("click", () => {
  document.body.classList.toggle("dark");
});

// Load job categories dynamically
const jobCategories = [
  "Engineering",
  "Design",
  "Marketing",
  "Finance",
  "Healthcare",
  "Education",
  "Sales",
  "IT Support"
];
const container = document.getElementById("jobCategories");
jobCategories.forEach((cat) => {
  const div = document.createElement("div");
  div.className = "category";
  div.innerHTML = `<strong>${cat}</strong>`;
  container.appendChild(div);
});
