//______________________________________________________________________________
// Crianca é a função que trata das crianças que seguem o jogador (vidas).
// recebe uma imagem aleatória das crianças.
//______________________________________________________________________________
function Crianca(imagem){
  this.correndo = false;
  this.imagem = imagem;
  this.frame = floor(random(0,40));
  this.animFrame = tamanhoSprites * 2;
  this.animLine = 0;
  this.x = random(0, width/8);
  if (width >= height){
    this.y = random(75 + (10 * escala), height/2 - 15 * escala);
  } else {
    this.y = random(75 + (10 * escala), height/2 - tamanhoSprites * escala);
  }
  this.velocidadeX = random(-0.0025, 0.0025);
  this.velocidadeY = random(-0.0025, 0.0025);
}

Crianca.prototype.update = function(){
  if (this.correndo){
    this.animLine = tamanhoSprites;
    this.x -= velocidadeGlobal * 5;
  } else {
    this.x += this.velocidadeX;
    this.y += this.velocidadeY;
    if (this.x < 0){
      this.velocidadeX += random(0.0025, 0.003);
    } else if (this.x > width/8){
      this.velocidadeX += random(-0.003, -0.0025);
    } else {
      this.velocidadeX += random(-0.0025, 0.0025);
    }
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
}

Crianca.prototype.fugiu = function(){
  return (this.x < 0 - tamanhoSprites * escala);
}

Crianca.prototype.show = function(){
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
  imgp = this.imagem.get(this.animFrame, this.animLine, tamanhoSprites, tamanhoSprites);
  translate(this.x, this.y);
  scale(escala);
  image(imgp, 0, 0); // desenha a imagem no canvas
  smooth();
  pop();
}
