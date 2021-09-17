window.onload = function(){
  if (window.localStorage != null) {
    let urlParam = location.search.substring(1);
    if(urlParam) {
      let param = urlParam.split('&');

      let paramArray = [];

      for (i = 0; i < param.length; i++) {
        let paramItem = param[i].split('=');
        paramArray[paramItem[0]] = paramItem[1];
      }

      let logid = paramArray.logid;
      let cam = paramArray.cam;
      let gr_no = paramArray.gr_no;
      let ad_no = paramArray.ad_no;
      let key = paramArray.key;
      let select = paramArray.select;
      let gclid = paramArray.gclid;
      let yclid = paramArray.yclid;
      if(gclid){
        window.localStorage.setItem('add', gclid);
      }
      if(yclid){
        window.localStorage.setItem('add', yclid);
      }
      if(logid){
        window.localStorage.setItem('logid', logid);
      }
      if(cam){
        window.localStorage.setItem('cam', cam);
      }
      if(gr_no){
        window.localStorage.setItem('gr_no', gr_no);
      }
      if(ad_no){
        window.localStorage.setItem('ad_no', ad_no);
      }
      if(key){
        window.localStorage.setItem('key', key);
      }
      if(select){
        window.localStorage.setItem('select', select);
      }
    }
  }

let logid = localStorage.getItem('logid');
let cam = localStorage.getItem('cam');
let gr_no = localStorage.getItem('gr_no');
let ad_no = localStorage.getItem('ad_no');
let key = localStorage.getItem('key');
let select = localStorage.getItem('select');
let add = localStorage.getItem('add');
console.log(add);
console.log(logid);
console.log(cam);
console.log(gr_no);
console.log(ad_no);
console.log(key);
console.log(select);


let uri = location.href;
if (uri.includes('link')) {
  let storage = document.getElementById('storage')
  let to_url = storage.getAttribute('data-url')
  console.log("data-url:"+to_url)
  if ( to_url.includes('j-a-net')) { 
    if(add){
            storage.setAttribute('href',to_url+add)
            setTimeout(function() {
                location.replace(to_url+add)
            }, 1000)
    }else{
        setTimeout(function() {
            location.replace(to_url)
        }, 1000)
    }
  }else if( to_url.includes('t.82comb.net')){
    if(add){
            storage.setAttribute('href',to_url+'&gclid='+add)
            setTimeout(function() {
                location.replace(to_url+'&gclid='+add)
            }, 1000)
    }else{
        setTimeout(function() {
            location.replace(to_url)
        }, 1000)
    }
  }else if( to_url.includes('h.accesstrade.net')){
    if(add){
            storage.setAttribute('href',to_url+'&add='+add)
            setTimeout(function() {
                location.replace(to_url+'&add='+add)
            }, 1000)
    }else{
        setTimeout(function() {
            location.replace(to_url)
        }, 1000)
    }
  }else{
    if(add){
            storage.setAttribute('href',to_url+'&add='+add)
            setTimeout(function() {
                location.replace(to_url+'&add='+add)
            }, 1000)
    }else{
        setTimeout(function() {
            location.replace(to_url)
        }, 1000)
    }
  }
}else{

  let htmlcoll = document.getElementsByTagName('a');
  for(let i=0;htmlcoll.length;i++){
    if(htmlcoll[i].hasAttribute('rel')){
      if(htmlcoll[i].getAttribute('rel')=='external nofollow'){
          let link = htmlcoll[i].getAttribute('href')
          if(add){
            let changeHref = link+"?logid=" + logid + "&add=" + add + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select
            htmlcoll[i].setAttribute('href',changeHref)
          }else{
            let changeHref = link+"?logid=" + logid + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select
            htmlcoll[i].setAttribute('href',changeHref)
          }
      }
    }
  }

}

}
