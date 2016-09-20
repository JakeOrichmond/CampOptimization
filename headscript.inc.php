<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Lytics -->
<script type="text/javascript" charset="utf-8">
	(function(d){
		window.jstagAsyncInit = function(){
			jstag.init({cid:"1339"})

			// now send data capture
			jstag.send({url: window.location})
		}
		var js, id = 'jstag-csdk', ref = d.getElementsByTagName('script')[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement('script'); js.id = id; js.async = true;
		js.src = "//c.lytics.io/static/io.min.js";
		ref.parentNode.insertBefore(js, ref);
	}(document));
</script>

<!-- start lytics/optimizely integration  -->
<script type="text/javascript">
	(function(d,w){
		var cookies, apiurl="";
		function readCookie(name,c,C,i){
			if(cookies){ return cookies[name]; }
			c = document.cookie.split('; ');
			cookies = {};
			for(i=c.length-1; i>=0; i--){
				C = c[i].split('=');
				cookies[C[0]] = C[1];
			}
			return cookies[name];
		}
		w["lio"] = w["lio"] || {
			segmentsHash : {},
			_uid : readCookie("seerid"),
			segmentscb:function(json){
				if ("data" in json) {
					if ("segments" in json.data) {
						var segList = json.data.segments;
						for (var i = segList.length - 1; i >= 0; i--) {
							this.segmentsHash[segList[i]] = segList[i];
						};
					}
				}
			}
		};
		apiurl = "https://api.lytics.io/api/me/1339/" + readCookie("seerid") + "?segments=true&callback=lio.segmentscb";
		document.write('\x3Cscript type="text/javascript" src="' + apiurl + '">\x3C/script>');
	}(document,window));
</script>
<!-- end lytics js.sdk -->

<script type="text/javascript">
	window['optimizely'] = window['optimizely'] || [];
	window['optimizely'].push(["customTag", lio.segmentsHash]);
</script>

<!-- Optimizely -->
<script src="//cdn.optimizely.com/js/1338716735.js"></script>
<!-- end Optimizely -->

<!-- Hotjar Tracking Code for http://teamroboboogie.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:208530,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<script src="https://app.simpla.io"></script>
 <script>Simpla('S1RXX0Hn');</script>
