<?php
/* Template Name: リンククリック用 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WSJ6LMZ');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="referrer" content="no-referrer-when-downgrade"/>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSJ6LMZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
$link_id = get_the_ID();
$url = "";

	if (isset($_GET['type'])) {
		if ($_GET['type'] == "electric") {
			if( have_rows('mousikomi2',$link_id) ):
				while( have_rows('mousikomi2',$link_id) ): the_row();
				$url = get_sub_field('url2');
				endwhile;
			endif;
		} else if ($_GET['type'] == "smart") {
			$url = get_post_meta( $link_id, 'mousikomi2_url2', true );
		} else if ($_GET['type'] == "free") {
			if( have_rows('mousikomi3',$link_id) ):
				while( have_rows('mousikomi3',$link_id) ): the_row();
				$url = get_sub_field('url3');
				endwhile;
			endif;
		}
			else if ($_GET['type'] == "plus") {
				if( have_rows('mousikomi4',$link_id) ):
					while( have_rows('mousikomi4',$link_id) ): the_row();
					$url = get_sub_field('url4');
					endwhile;
				endif;
		}else if($_GET['type'] == "pickup"){
			$url = get_post_meta( $link_id, 'pickup_url', true );
		}
	}
	if ($url == "") {
		if( have_rows('mousikomi1',$link_id) ):
			while( have_rows('mousikomi1',$link_id) ): the_row();
			$url = get_sub_field('url1');
			endwhile;
		endif;
	}


if ($url !== "") {
	//このページ噛ますように変更
	//header( "location: {$url}");
	?>
	公式サイトに移動します。
	このページはpage-link.php
	<script>

        let gclid = localStorage.getItem('gclid');
        let yclid = localStorage.getItem('yclid');
        let to_link  = '<?php echo $url; ?>&add=';
        if(gclid){
            let linkUrl = to_link+gclid;
            setTimeout(function() {
                location.replace(linkUrl);
            }, 1000);
            console.log("gclid:"+gclid);
            console.log("yclid:"+yclid);
            console.log("link:"+linkUrl);
        }else
        if(yclid){
            let linkUrl = to_link+yclid;
            setTimeout(function() {
                location.replace(linkUrl);
            }, 1000);
            console.log("gclid:"+gclid);
            console.log("yclid:"+yclid);
            console.log("link:"+linkUrl);
        }else{
            let linkUrl = to_link;
            setTimeout(function() {
                location.replace(linkUrl);
            }, 1000);
            console.log("gclid:"+gclid);
            console.log("yclid:"+yclid);
            console.log("link:"+linkUrl);
        }
	//setTimeout(function(){
	//	//alert("<?php echo $url; ?>");
	//	location.replace("<?php echo $url; ?>");
	//}, 10000);
	</script>
	
	
	<!-- <?php
	//リダイレクト
} else {
		//トップページへリダイレクト
		wp_redirect( home_url() ); exit;
} 
?>

<?php the_field('ydn'); ?>

</body>
</html>