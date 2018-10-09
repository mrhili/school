//______________________________________________________________________________
// Ponto é a função que faz o número "flutuar" até a pontuação final.
// recebe tipo (se é pontuação ou moeda), valor (quantidade de pontos), x e y.
//______________________________________________________________________________
function Ponto(tipo, valor, x, y){
  this.tipo = tipo;
  this.valor = valor;
  this.posicao = createVector(x, y);
  this.velocidade = p5.Vector.random2D(0.5);
  this.aceleracao = 0.2;
}

// as partículas de pontos irão correr até um ponto(x,y) e sumir ao chegar lá
Ponto.prototype.movimenta = function(vetor) {
  this.t = vetor;
  var desejo = p5.Vector.sub(vetor, this.posicao);
  desejo.setMag(this.aceleracao);
  var direcao = p5.Vector.sub(desejo, this.velocidade);

  this.velocidade.add(direcao);
  this.posicao.add(this.velocidade);
  if (this.aceleracao < 10){
    this.aceleracao += 0.2;
  }

  if (round(random(0, 2)) == 2){
    vetorParticulas.push(new Particula(this.posicao.x, this.posicao.y, 1));
  }

  if (round(this.posicao.y) >= vetor.y - 10 && round(this.posicao.y) <= vetor.y + 10){
    if (round(this.posicao.x) >= vetor.x - 10 && round(this.posicao.x) <= vetor.x + 10){
      return true;
    }
  }
  return false;
}

Ponto.prototype.show = function(){
  push();
  textAlign(CENTER);
  textFont(fonte, 25);
  fill(255);
  text("+" + this.valor, this.posicao.x, this.posicao.y);
  pop();
}
