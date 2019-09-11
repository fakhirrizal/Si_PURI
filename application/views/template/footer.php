	<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							Perpustakaan
							<span class="blue bolder">Online</span>
							&copy; 2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=base_url('assets/js/jquery.js');?>'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=base_url('assets/js/jquery.mobile.custom.js');?>'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url('assets/js/bootstrap.js');?>" type="text/javascript"></script>
		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="<?=base_url('assets/js/jquery-ui.custom.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.ui.touch-punch.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.easypiechart.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.sparkline.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.flot.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.flot.pie.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/jquery.flot.resize.js');?>" type="text/javascript"></script>

		<!-- ace scripts -->
		<script src="<?=base_url('assets/js/ace/elements.scroller.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.colorpicker.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.fileinput.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.typeahead.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.wysiwyg.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.spinner.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.treeview.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.wizard.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/elements.aside.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.ajax-content.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.touch-drag.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.sidebar.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.sidebar-scroll-1.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.submenu-hover.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.widget-box.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings-rtl.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.settings-skin.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.widget-on-reload.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.searchbox-autocomplete.js');?>" type="text/javascript"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
					{
						tagValuesAttribute:'data-values',
						type: 'bar',
						barColor: barColor ,
						chartRangeMin:$(this).data('min') || 0
					});
				});
				// flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
				// but sometimes it brings up errors with normal resize event handlers
				$.resize.throttleWindow = false;

				var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
				var data = [
					{ label: "social networks",  data: 38.7, color: "#68BC31"},
					{ label: "search engines",  data: 24.5, color: "#2091CF"},
					{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
					{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
					{ label: "other",  data: 10, color: "#FEE074"}
				]
				function drawPieChart(placeholder, data, position) {
					$.plot(placeholder, data, {
						series: {
							pie: {
								show: true,
								tilt:0.8,
								highlight: {
									opacity: 0.25
								},
								stroke: {
									color: '#fff',
									width: 2
								},
								startAngle: 2
							}
						},
						legend: {
							show: true,
							position: position || "ne",
							labelBoxBorderColor: null,
							margin:[-30,15]
						}
						,
						grid: {
							hoverable: true,
							clickable: true
						}
					})
				}
				drawPieChart(placeholder, data);

				/**
				we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
				so that's not needed actually.
				*/
				placeholder.data('chart', data);
				placeholder.data('draw', drawPieChart);

				//pie chart tooltip example
				var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
				var previousPoint = null;

				placeholder.on('plothover', function (event, pos, item) {
					if(item) {
						if (previousPoint != item.seriesIndex) {
							previousPoint = item.seriesIndex;
							var tip = item.series['label'] + " : " + item.series['percent']+'%';
							$tooltip.show().children(0).text(tip);
						}
						$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
					} else {
						$tooltip.hide();
						previousPoint = null;
					}
				});
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
					var off2 = $source.offset();
					//var w2 = $source.width();
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				$('.dialogs,.comments').ace_scroll({
					size: 300
				});
				// Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				// so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
					$('#tasks').on('touchstart', function(e){
						var li = $(e.target).closest('#tasks li');
						if(li.length == 0)return;
						var label = li.find('label.inline').get(0);
						if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
					});
					$('#tasks').sortable({
						opacity:0.8,
						revert:true,
						forceHelperSize:true,
						placeholder: 'draggable-placeholder',
						forcePlaceholderSize:true,
						tolerance:'pointer',
						stop: function( event, ui ) {
							//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
							$(ui.item).css('z-index', 'auto');
						}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			})
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?=base_url('assets/css/ace.onpage-help.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?=base_url('assets/css/sunburst.css');?>" type="text/css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?=base_url('assets/js/ace/elements.onpage-help.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/ace/ace.onpage-help.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/rainbow.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/language/generic.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/language/html.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/language/css.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets/js/language/javascript.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('assets2/global/scripts/datatable.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/datatables/datatables.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('assets2/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js');?>" type="text/javascript"></script>
	</body>
</html>