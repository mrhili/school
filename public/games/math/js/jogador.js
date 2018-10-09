//______________________________________________________________________________
// Jogador é a função que trata dos dados do jogador, assim como o personagem.
// recebe o nome do jogador e a imagem escolhida pelo jogador.
//______________________________________________________________________________
function Jogador(nome, imagem){
  this.nome = nome;
  this.imagem = imagem;
  this.frame = 0;
  this.animFrame = tamanhoSprites * 2;
  this.y = random(90 + (10 * escala), height/2 - tamanhoSprites * escala - 30);
  this.velocidadeY = random(-0.0025, 0.0025);
}

Jogador.prototype.update = function(){
  this.y += this.velocidadeY;
  if (this.y < 75 + (10 * escala)){
    this.velocidadeY += random(0.0025, 0.003);
  } else if (this.y > height/2 - tamanhoSprites * escala || ((width >= height) && (this.y > height/2 - 15 * escala))){
    this.velocidadeY += random(-0.003, -0.0025);
  } else {
    this.velocidadeY += random(-0.0025, 0.0025);
  }

  if (this.velocidadeX > 0.06){
    this.velocidadeX = 0.06;
  } else if (this.velocidadeX < -0.06){
    this.velocidadeX = -0.06;
  }
  if (this.velocidadeY > 0.06){
    this.velocidadeY = 0.06;
  } else if (this.velocidadeY < -0.06){
    this.velocidadeY = -0.06;
  }
}

Jogador.prototype.show = function(){
  // pegar coluna do gráfico para a animação dependendo do frame
  if (this.frame >= 0 && this.frame < 5 || this.frame >= 20 && this.frame < 25){
    this.animFrame = tamanhoSprites * 2;
    this.frame += fps;
  } else if (this.frame >= 5 && this.frame < 10 || this.frame >= 15 && this.frame < 20){
    this.animFrame = tamanhoSprites;
    this.frame += fps;
  } else if (this.frame >= 10 && this.frame < 15){
    this.animFrame = 0;
    this.frame += fps;
  } else if (this.frame >= 25 && this.frame < 30 || this.frame >= 35 && this.frame < 40){
    this.animFrame = tamanhoSprites * 3;
    this.frame += fps;
  } else if (this.frame >= 30 && this.frame < 35){
    this.animFrame = tamanhoSprites * 4;
    this.frame += fps;
  } else {
    this.animFrame = tamanhoSprites * 2;
    this.frame = 0;
  }

  // noSmooth() serve para escalonar o objeto usando NearestNeighbor para não perder qualidade do pixel
  push();
  noSmooth();
  imgp = this.imagem.get(this.animFrame, 0, tamanhoSprites, tamanhoSprites);
  translate(width/6, this.y);
  scale(escala);
  image(imgp, 0, 0); // desenha a imagem no canvas
  smooth();
  pop();
}
