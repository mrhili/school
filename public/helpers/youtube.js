function getAfterUrl(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var regExp2 = /^.*(youtube.com\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    //
    if (url.match(regExp) && url.match(regExp)[2].length == 11 ) {
        return url.match(regExp)[2];
    } else if(url.match(regExp2) && url.match(regExp2)[2].length == 11 ){
        return url.match(regExp2)[2];
    }else{
      return null;
    }
}
