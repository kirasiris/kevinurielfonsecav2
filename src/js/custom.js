/** Portfolio **/
/* ============================================================
 * bootstrap-portfilter.js for Bootstrap v2.3.1
 * https://github.com/geedmo/portfilter
 * ============================================================*/
;!function(t){
	"use strict";
	var i="portfilter", n=function(i){
		this.$element = t(i),
		this.stuff = t("[data-tag]"),
		this.target = this.$element.data("target")||""
	};
	n.prototype.filter=function(){
		var i=[],
		n=this.target;
		this.stuff.fadeOut("fast").promise().done(function(){
		t(this).each(function(){
			var a=this,e=t(t(this).data("tag").split(" "));e.each(function(t,e){
				(e==n||"all"==n)&&i.push(a)
			})
		}),
		t(i).show()
	})};
	var a=t.fn[i];t.fn[i]=function(a){
		return this.each(function(){
	var e=t(this),f=e.data(i);f||e.data(i,f=new n(this)),"filter"==a&&f.filter()})},t.fn[i].defaults={},t.fn[i].Constructor=n,t.fn[i].noConflict=function(){
		return t.fn[i]=a,this},t(document).on("click.portfilter.data-api","[data-toggle^=portfilter]",function(){
			t(this).portfilter("filter")}
		)}
		(window.jQuery);

/** Back to Top **/
;jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});
$(document).ready(function() {
	/*
	*
	* CONFIRM STATUS REPORT
	*
	*/
	$('a[data-confirm-delete]').click(function(ev) {
		var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append(`
				<div id="dataConfirmModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" role="document">
		          <div class="modal-content">
		              <div class="modal-header">
		                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: 6px">×</button>
		                  <h5 id="dataConfirmLabel">Please Confirm Report</h5>
		              </div>
		              <div class="modal-body"></div>
		              <div class="modal-footer">
		                  <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
		                  <a class="btn btn-primary btn-sm" id="dataConfirmOK">OK</a>
		              </div>
		          </div>
		        </div>
		      </div>
			`);
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm-delete'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		return false;
	});
});
