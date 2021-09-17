jQuery(function(){
  if (window.localStorage != null) {
    var urlParam = location.search.substring(1);
    if(urlParam) {
      var param = urlParam.split('&');

      var paramArray = [];

      for (i = 0; i < param.length; i++) {
        var paramItem = param[i].split('=');
        paramArray[paramItem[0]] = paramItem[1];
      }

      var logid = paramArray.logid;
      var cam = paramArray.cam;
      var gr_no = paramArray.gr_no;
      var ad_no = paramArray.ad_no;
      var key = paramArray.key;
      var select = paramArray.select;
      var gclid = paramArray.gclid;
      var yclid = paramArray.yclid;
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

var logid = localStorage.getItem('logid');
var cam = localStorage.getItem('cam');
var gr_no = localStorage.getItem('gr_no');
var ad_no = localStorage.getItem('ad_no');
var key = localStorage.getItem('key');
var select = localStorage.getItem('select');
var add = localStorage.getItem('add');
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
  let script = document.createElement('script'); 
  script.src = "//code.jquery.com/jquery-1.12.4.min.js";
  script.crossorigin = "anonymous";
  storage.before(script)
  
  let add = localStorage.getItem('add');
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

  jQuery('a.prrrr').each(function(e,v){
    var url =  jQuery(v).attr("href");
    console.log(url);
    if(add){
      jQuery(v).attr("href",url + "?logid=" + logid + "&add=" + add + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select)
    }else{
      jQuery(v).attr("href",url + "?logid=" + logid + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select)
    }
  });

}
});

