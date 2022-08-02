//https://gist.github.com/bajpangosh/d322c4d7823d8707e19d20bc71cd5a4f

jQuery(window).load(function() {
	var tag = document.createElement("script");
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName("script")[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	// Init empty array of iframe IDs, one from each video
	var iframeIds = [];
	var videoIDS = [];
	var height = [];
	var width = [];

	// For each iframe you find, add its ID to the iframeIds array
	var iframes = document.querySelectorAll(".ar-video-container .cys_eachframe");
	jQuery(".ar-video-container .cys_eachframe").each(function(){
		iframeIds.push(jQuery(this).attr('id'));
		videoIDS.push(jQuery(this).attr('data-video'));
		height.push(jQuery(this).attr('data-height'));
		width.push(jQuery(this).attr('data-width'));
	});

	var i=-1;
	window.onYouTubeIframeAPIReady = function() {
		//console.log(iframeIds);
		iframeIds.forEach(function(iframeId) {
			i++;
			//alert(i);
		// alert(iframeId);
			var player = new YT.Player(iframeId, {
				videoId : videoIDS[i],
				height : height[i],
				width: width[i],
				playerVars: {
					'playsinline': 1,
					'rel': 0,
					'cc_load_policy': 1,
					'cc_lang_pref': 'en',
					'loop': 1,
					'iv_load_policy':3
				},
				events: {
					onReady: cys_onPlayerReady,
					onStateChange: function(event) {   
					var vdoid = event.target.playerInfo.videoData.video_id;   
					if (event.data == YT.PlayerState.ENDED) {
						jQuery('#ytyhumbnail-'+vdoid).hide();
						//jQuery('#ytr_playbtn_-'+vdoid).hide();
						jQuery(".hytPlayerWrap1-"+vdoid).addClass("ended1");
					} else if (event.data == YT.PlayerState.PAUSED) {
						jQuery('#ytyhumbnail-'+vdoid).hide();
						//jQuery('#ytr_playbtn_-'+vdoid).show();
						jQuery(".hytPlayerWrap1-"+vdoid).addClass("paused1");
					} else if (event.data == YT.PlayerState.PLAYING) {
						jQuery('#ytyhumbnail-'+vdoid).hide();
						//jQuery('#ytr_playbtn_-'+vdoid).hide();
						jQuery(".hytPlayerWrap1-"+vdoid).removeClass("paused1");
					}
				}
				}
			});
			//console.log(player);
		});
		
	}

	var iframeObjects = [];

	function cys_onPlayerReady(event) {
		//alert('onPlayerReady');
		var iframeObject = event.target;
		console.log(event);
		
		// Push current iframe object to array
		iframeObjects.push(iframeObject);
		

		iframeObjects.forEach(function(scopediframeObject) {
			console.log(scopediframeObject);
			var vdoid = scopediframeObject.playerInfo.videoData.video_id;
			//alert(vdoid);
			jQuery("#yt-play-button-home-"+vdoid).click(function() {
				jQuery('#innerwrap-'+vdoid).hide();
				jQuery('#ytyhumbnail-'+vdoid).hide();
				//jQuery('#ytr_playbtn_-'+vdoid).hide();
				scopediframeObject.playVideo(); 
			}); 

			jQuery("#ytyhumbnail-"+vdoid).click(function() {
				jQuery('#innerwrap-'+vdoid).hide();
				jQuery('#ytyhumbnail-'+vdoid).hide();
				//jQuery('#ytr_playbtn_'+vdoid).hide();
				scopediframeObject.playVideo(); 
			}); 

			jQuery(".hytPlayerWrap1-"+vdoid+", .paused1").click(function() {
				
				if ( scopediframeObject.getPlayerState() == 0 ) { //ended
					//alert();
					jQuery('#ytyhumbnail-'+vdoid).hide();
					//jQuery('#ytr_playbtn_'+vdoid).hide();
					jQuery(".hytPlayerWrap1-"+vdoid).removeClass("paused1");
					scopediframeObject.seekTo(0);
				} else if ( scopediframeObject.getPlayerState() == 2) { //paused
					jQuery('#ytyhumbnail-'+vdoid).hide();
					//jQuery('#ytr_playbtn_'+vdoid).hide();
					jQuery(".hytPlayerWrap1-"+vdoid).removeClass("paused1");
					scopediframeObject.playVideo();
				}
			});

			jQuery(".hytPlayerWrap1-"+vdoid+", .ended1").click(function() {
				if ( scopediframeObject.getPlayerState() == 0 ) {//ended
					jQuery(".hytPlayerWrap1-"+vdoid).removeClass("ended1");
					scopediframeObject.playVideo();
				}
			});
		});
	}

});
