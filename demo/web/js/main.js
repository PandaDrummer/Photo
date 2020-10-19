$( document ).ready(function() {
    ;(function() {
            // Initialize
            var bLazy = new Blazy({
            	offset: -100
            });
        })();
});




    	$( "img" ).click(function() {
			console.log('sd');
		});
	
$(".burger").click(function() {
    $(".nav-links").toggleClass("nav-active");
    $(".line1").toggleClass("line1-toggle");
    $(".line2").toggleClass("line2-toggle");
    $(".line3").toggleClass("line3-toggle");
});

function view_video(name , link) {
    if(link==0){
    	$(".video_page_video").css({
        "display": "flex"
    });
    console.log("../video/ "+name+"");
    document.getElementById("video_play").src = "../video/"+name+"";
    document.getElementById("myVideo").load();
    } else{
    	$(".video_page_video_yt").css({
        "display": "flex"
    	});
    	$('.video_page_video_yt iframe').attr('src' , "https://www.youtube.com/embed/"+name+" ")
    }
    
}
function view_photo(name) {
    console.log(name);
    $(".view_photo_click").css({
        "display": "flex"
    });
    document.getElementById("photo_play").src = name;
}
$('#close_btn').click(function() {
    document.getElementById("myVideo").pause();
    $(".video_page_video").css({
        "display": "none"
    });
    $(".video_page_video_yt").css({
        "display": "none"
    });

});
$('#close_btn_yt').click(function() {
    var name =  $('#yt').attr('src');
    $('#yt').attr('src',"");
    $('#yt').attr('src',name);
    $(".video_page_video_yt").css({
        "display": "none"
    });
    

});
$('#close_btn_img').click(function() {
    $(".view_photo_click").css({
        "display": "none"
    });
    

});
function swipe(img,id){
	console.log(img , id);
}



