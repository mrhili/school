//______________________________________________________________________________
// Moeda é a função que trata das moedas deixadas pelos inimigos.
// recebe apenas a posição X e Y do inimigo derrotado.
//______________________________________________________________________________
function Moeda(x, y){
  this.frame = 0;
  this.animFrame = 0;
  this.animLine = 30;
  this.x = x;
  this.y = y;
}

Moeda.prototype.mousePressed = function(){
  if (mouseX >= this.x && mouseX < this.x + 15 * escala && mouseY >= this.y && mouseY < this.y + 15 * escala){
    pontoParticulas.push(new Ponto(1, "1", this.x, this.y));
    return true;
  }
}

Moeda.prototype.show = function(){
  // pegar coluna do gráfico para a animação dependendo do frame
  if (this.frame >= 0 && this.frame < 5){
    this.animFrame = 0;
    this.animLine = 30;
    this.frame += fps;
  } else if (this.frame >= 5 && this.frame < 10 || this.frame >= 35 && this.frame < 40){
    this.animFrame = 15;
    this.animLine = 30;
    this.frame += fps;
  } else if (this.frame >= 10 && this.frame < 15 || this.frame >= 30 && this.frame < 35){
    this.animFrame = 30;
    this.animLine = 30;
    this.frame += fps;
  } else if (this.frame >= 15 && this.frame < 20 || this.frame >= 25 && this.frame < 30){
    this.animFrame = 45;
    this.animLine = 30;
    this.frame += fps;
  } else if (this.frame >= 20 && this.frame < 25){
    this.animFrame = 0;
    this.animLine = 45;
    this.frame += fps;
  } else {
    this.animFrame = 0;
    this.animLine = 30;
    this.frame = 0;
  }

  // noSmooth() serve para escalonar o objeto usando NearestNeighbor para não perder qualidade do pixel
  push();
  noSmooth();
  imgp = imagemParticula.get(this.animFrame, this.animLine, 15, 15);
  translate(this.x, this.y);
  scale(escala);
  image(imgp, 0, 0); // desenha a imagem no canvas
  smooth();
  pop();

  // chance de brilhar
  if (round(random(0, 39)) == 39){
    vetorParticulas.push(new Particula(this.x, this.y, 2));
  }

  // atualiza posição
  this.x -= 1;
  return (this.x < -20);
}
