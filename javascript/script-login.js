new window.VLibras.Widget('https://vlibras.gov.br/app'); // Integração da ferramenta VLibras

// Seleciona todos os elementos com a classe ".input-field" (campos de input do formulário)
const inputs = document.querySelectorAll(".input-field");

// Seleciona todos os botões de alternância com a classe ".toggle" (botões para mudar entre login e cadastro)
const toggle_btn = document.querySelectorAll(".toggle");

// Seleciona o elemento <main> da página (que contém o formulário e o carrossel)
const main = document.querySelector("main");

// Seleciona todos os elementos <span> dentro da classe ".bullets" (pontos do carrossel de citações)
const bullets = document.querySelectorAll(".bullets span");

// Seleciona todos os elementos com a classe ".image" (imagens do carrossel)
const images = document.querySelectorAll(".image");

// Para cada campo de input, adiciona os eventos de foco (focus) e desfoco (blur)
inputs.forEach((inp) => {
  // Quando o campo de input ganha foco, a classe "active" é adicionada
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });

  // Quando o campo perde o foco (blur), remove a classe "active" se o valor do input estiver vazio
  inp.addEventListener("blur", () => {
    if (inp.value != "") return; // Se o input não estiver vazio, não remove a classe
    inp.classList.remove("active");
  });
});

// Para cada botão de alternância (login/cadastro), adiciona um evento de clique
toggle_btn.forEach((btn) => {
  // Ao clicar no botão de alternância, adiciona/remove a classe "sign-up-mode" no elemento <main>
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode"); // Alterna entre os modos "login" e "cadastro"
  });
});

// Função responsável por mover o slider (carrossel de imagens e citações)
function moveSlider() {
  // Obtém o índice do elemento "bullet" clicado (armazenado no atributo "data-value")
  let index = this.dataset.value;

  // Seleciona a imagem correspondente ao índice clicado
  let currentImage = document.querySelector(`.img-${index}`);

  // Remove a classe "show" de todas as imagens para ocultá-las
  images.forEach((img) => img.classList.remove("show"));

  // Adiciona a classe "show" na imagem atual para exibi-la
  currentImage.classList.add("show");

  // Seleciona o container de textos do carrossel
  const textSlider = document.querySelector(".text-group");

  // Move o container de textos verticalmente de acordo com o índice, ajustando a posição dos textos
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  // Remove a classe "active" de todos os bullets (indicadores do carrossel)
  bullets.forEach((bull) => bull.classList.remove("active"));

  // Adiciona a classe "active" ao bullet atual (o que foi clicado)
  this.classList.add("active");
}

// Adiciona o evento de clique a cada bullet do carrossel
bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider); // Ao clicar, chama a função moveSlider
});
