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
console.log(gclid);
console.log(yclid);
        if(gclid){
          window.localStorage.setItem('gclid', gclid);
        }
        if(yclid){
          window.localStorage.setItem('yclid', yclid);
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

  var logid = localStorage.getItem('logid', logid);
  var cam = localStorage.getItem('cam', cam);
  var gr_no = localStorage.getItem('gr_no', gr_no);
  var ad_no = localStorage.getItem('ad_no', ad_no);
  var key = localStorage.getItem('key', key);
  var select = localStorage.getItem('select', select);
  var gclid = localStorage.getItem('gclid', gclid);
  var yclid = localStorage.getItem('yclid', yclid);
  console.log(gclid);
  console.log(yclid);
  console.log(logid);
  console.log(cam);
  console.log(gr_no);
  console.log(ad_no);
  console.log(key);
  console.log(select);
        jQuery('a.prrrr').each(function(e,v){
                var url =  jQuery(v).attr("href");
                console.log(url);
                if(gclid){
                jQuery(v).attr("href",url + "&logid=" + logid + "&add=" + gclid + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select)
                }else
                if(yclid){
                jQuery(v).attr("href",url + "&logid=" + logid + "&add=" + yclid + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select)
                }else{
                jQuery(v).attr("href",url + "&logid=" + logid + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key + "&select=" + select)
                }
        });
});

