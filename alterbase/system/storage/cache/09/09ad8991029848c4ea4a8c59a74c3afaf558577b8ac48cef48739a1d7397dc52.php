<?php

/* extension/MRP/productview_stock.twig */
class __TwigTemplate_73ebe6593ee4c99bb88b2f643422784e327ca568385cba56fa856464ddc1f1d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<div class=\"panel panel-default\">
\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_stock\">
\t\t<div class=\"panel-heading\">
\t\t\t<h3 class=\"panel-title\">
\t\t\t\t<i class=\"fas fa-boxes\"></i>&nbsp;";
        // line 6
        echo (isset($context["text_stock"]) ? $context["text_stock"] : null);
        echo "
\t\t\t</h3>
\t\t</div>
\t</a>
\t<div id=\"prod_stock\" class=\"panel-collapse collapse\">
\t\t<div class=\"panel-body\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<a href=\"#stockhistory-popup\"\tdata-toggle=\"tooltip\" title=\"";
        // line 13
        echo (isset($context["button_stock_transactionHistory"]) ? $context["button_stock_transactionHistory"] : null);
        echo "\"\tclass=\"btn btn-primary\" id=\"open_stockhistory-popup\"><i class=\"fa ";
        echo (isset($context["button_stock_transactionHistory_icon"]) ? $context["button_stock_transactionHistory_icon"] : null);
        echo "\"\t></i></a>
\t\t\t\t<a href=\"";
        // line 14
        echo (isset($context["addstock"]) ? $context["addstock"] : null);
        echo "\"\t\t\tdata-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_stock_add"]) ? $context["button_stock_add"] : null);
        echo "\"\t\t\t\tclass=\"btn btn-primary open-popup-ajax\" id=\"open_stockadd\"\t\t\t><i class=\"fa ";
        echo (isset($context["button_stock_add_icon"]) ? $context["button_stock_add_icon"] : null);
        echo "\"\t\t\t\t\t></i></a>
\t\t\t</div>
\t\t\t<table id=\"stocktable\" class=\"display\" style=\"width:100%\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>";
        // line 19
        echo (isset($context["entry_location"]) ? $context["entry_location"] : null);
        echo "</th>
\t\t\t\t\t\t<th>";
        // line 20
        echo (isset($context["entry_ref"]) ? $context["entry_ref"] : null);
        echo "</th>
\t\t\t\t\t\t<th>";
        // line 21
        echo (isset($context["entry_qty"]) ? $context["entry_qty"] : null);
        echo "</th>
\t\t\t\t\t\t<th>";
        // line 22
        echo (isset($context["entry_action"]) ? $context["entry_action"] : null);
        echo "</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t</table>
\t\t\t
\t\t\t<div id=\"stockhistory-popup\" class=\"white-popup mfp-hide panel panel-default\">
\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t<h3 class=\"panel-title\"><i class=\"fa ";
        // line 29
        echo (isset($context["button_stock_transactionHistory_icon"]) ? $context["button_stock_transactionHistory_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["button_stock_transactionHistory"]) ? $context["button_stock_transactionHistory"] : null);
        echo "<h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t<table id=\"stocktransactiontable\" class=\"display\" style=\"width:100%\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 35
        echo (isset($context["entry_date"]) ? $context["entry_date"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>from&nbsp;";
        // line 36
        echo (isset($context["entry_location"]) ? $context["entry_location"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>from&nbsp;";
        // line 37
        echo (isset($context["entry_ref"]) ? $context["entry_ref"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>to&nbsp;";
        // line 38
        echo (isset($context["entry_location"]) ? $context["entry_location"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>to&nbsp;";
        // line 39
        echo (isset($context["entry_ref"]) ? $context["entry_ref"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 40
        echo (isset($context["entry_qty"]) ? $context["entry_qty"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t<th>";
        // line 41
        echo (isset($context["entry_user"]) ? $context["entry_user"] : null);
        echo "</th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<script>
\t\t\t\t\$(function () {
\t\t\t\t\t\$('#stocktable').DataTable( {
\t\t\t\t\t\tprocessing: true,
\t\t\t\t\t\tserverSide: true,
\t\t\t\t\t\tfixedHeader: true,
\t\t\t\t\t\tdestroy: true,
\t\t\t\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\t\t\t\tajax: \"";
        // line 55
        echo (isset($context["ajax_route_stock"]) ? $context["ajax_route_stock"] : null);
        echo "\",
\t\t\t\t\t} );
\t\t\t\t\t\$('#stocktable').DataTable().on( 'draw', function (e, settings) {
\t\t\t\t\t\tconsole.log('stocktable is loaded');
\t\t\t\t\t\t\$('.open-popup-ajax').magnificPopup({
\t\t\t\t\t\t\ttype: 'ajax',
\t\t\t\t\t\t\tcloseOnBgClick: false,
\t\t\t\t\t\t\tajax: {
\t\t\t\t\t\t\t\tsettings: {
\t\t\t\t\t\t\t\t\tcache:false,
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tcursor: 'mfp-ajax-cur', // CSS class that will be added to body during the loading (adds \"progress\" cursor)
\t\t\t\t\t\t\t\ttError: '<a href=\"%url%\">The content</a> could not be loaded.' //  Error message, can contain %curr% and %total% tags if gallery is enabled
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\tcallbacks: {
\t\t\t\t\t\t\t\tajaxContentAdded: function() {
\t\t\t\t\t\t\t\t\tthis.content.find(\"script\").each(function(i) {
\t\t\t\t\t\t\t\t\t\teval(\$(this).text());
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t},
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t\t\$('#open_stockhistory-popup').magnificPopup({
\t\t\t\t\t\ttype:'inline',
\t\t\t\t\t\tcloseOnBgClick: false,
\t\t\t\t\t\tmidClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
\t\t\t\t\t\tcallbacks: {
\t\t\t\t\t\t\topen: function() {
\t\t\t\t\t\t\t\tconsole.log('Popup is opened');
\t\t\t\t\t\t\t\t\$('#stocktransactiontable').DataTable( {
\t\t\t\t\t\t\t\t\tprocessing: true,
\t\t\t\t\t\t\t\t\tserverSide: true,
\t\t\t\t\t\t\t\t\tfixedHeader: true,
\t\t\t\t\t\t\t\t\tdestroy: true,
\t\t\t\t\t\t\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\t\t\t\t\t\t\tajax: \"";
        // line 91
        echo (isset($context["ajax_route_stocktransaction"]) ? $context["ajax_route_stocktransaction"] : null);
        echo "\"
\t\t\t\t\t\t\t\t} );
\t\t\t\t\t\t\t},
\t\t\t\t\t\t},
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productview_stock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 91,  128 => 55,  111 => 41,  107 => 40,  103 => 39,  99 => 38,  95 => 37,  91 => 36,  87 => 35,  76 => 29,  66 => 22,  62 => 21,  58 => 20,  54 => 19,  42 => 14,  36 => 13,  26 => 6,  19 => 1,);
    }
}
/* */
/* <div class="panel panel-default">*/
/* 	<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_stock">*/
/* 		<div class="panel-heading">*/
/* 			<h3 class="panel-title">*/
/* 				<i class="fas fa-boxes"></i>&nbsp;{{ text_stock }}*/
/* 			</h3>*/
/* 		</div>*/
/* 	</a>*/
/* 	<div id="prod_stock" class="panel-collapse collapse">*/
/* 		<div class="panel-body">*/
/* 			<div class="pull-right">*/
/* 				<a href="#stockhistory-popup"	data-toggle="tooltip" title="{{ button_stock_transactionHistory }}"	class="btn btn-primary" id="open_stockhistory-popup"><i class="fa {{ button_stock_transactionHistory_icon }}"	></i></a>*/
/* 				<a href="{{addstock}}"			data-toggle="tooltip" title="{{ button_stock_add }}"				class="btn btn-primary open-popup-ajax" id="open_stockadd"			><i class="fa {{ button_stock_add_icon }}"					></i></a>*/
/* 			</div>*/
/* 			<table id="stocktable" class="display" style="width:100%">*/
/* 				<thead>*/
/* 					<tr>*/
/* 						<th>{{entry_location}}</th>*/
/* 						<th>{{entry_ref}}</th>*/
/* 						<th>{{entry_qty}}</th>*/
/* 						<th>{{entry_action}}</th>*/
/* 					</tr>*/
/* 				</thead>*/
/* 			</table>*/
/* 			*/
/* 			<div id="stockhistory-popup" class="white-popup mfp-hide panel panel-default">*/
/* 				<div class="panel-heading">*/
/* 					<h3 class="panel-title"><i class="fa {{ button_stock_transactionHistory_icon }}"></i>&nbsp;{{ button_stock_transactionHistory}}<h3>*/
/* 				</div>*/
/* 				<div class="panel-body">*/
/* 					<table id="stocktransactiontable" class="display" style="width:100%">*/
/* 						<thead>*/
/* 							<tr>*/
/* 								<th>{{entry_date}}</th>*/
/* 								<th>from&nbsp;{{entry_location}}</th>*/
/* 								<th>from&nbsp;{{entry_ref}}</th>*/
/* 								<th>to&nbsp;{{entry_location}}</th>*/
/* 								<th>to&nbsp;{{entry_ref}}</th>*/
/* 								<th>{{entry_qty}}</th>*/
/* 								<th>{{entry_user}}</th>*/
/* 							</tr>*/
/* 						</thead>*/
/* 					</table>*/
/* 				</div>*/
/* 			</div>*/
/* 			<script>*/
/* 				$(function () {*/
/* 					$('#stocktable').DataTable( {*/
/* 						processing: true,*/
/* 						serverSide: true,*/
/* 						fixedHeader: true,*/
/* 						destroy: true,*/
/* 						lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 						ajax: "{{ ajax_route_stock }}",*/
/* 					} );*/
/* 					$('#stocktable').DataTable().on( 'draw', function (e, settings) {*/
/* 						console.log('stocktable is loaded');*/
/* 						$('.open-popup-ajax').magnificPopup({*/
/* 							type: 'ajax',*/
/* 							closeOnBgClick: false,*/
/* 							ajax: {*/
/* 								settings: {*/
/* 									cache:false,*/
/* 								},*/
/* 								cursor: 'mfp-ajax-cur', // CSS class that will be added to body during the loading (adds "progress" cursor)*/
/* 								tError: '<a href="%url%">The content</a> could not be loaded.' //  Error message, can contain %curr% and %total% tags if gallery is enabled*/
/* 							},*/
/* 							callbacks: {*/
/* 								ajaxContentAdded: function() {*/
/* 									this.content.find("script").each(function(i) {*/
/* 										eval($(this).text());*/
/* 									});*/
/* 								}*/
/* 							},*/
/* 						});*/
/* 					});*/
/* 					$('#open_stockhistory-popup').magnificPopup({*/
/* 						type:'inline',*/
/* 						closeOnBgClick: false,*/
/* 						midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.*/
/* 						callbacks: {*/
/* 							open: function() {*/
/* 								console.log('Popup is opened');*/
/* 								$('#stocktransactiontable').DataTable( {*/
/* 									processing: true,*/
/* 									serverSide: true,*/
/* 									fixedHeader: true,*/
/* 									destroy: true,*/
/* 									lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 									ajax: "{{ ajax_route_stocktransaction }}"*/
/* 								} );*/
/* 							},*/
/* 						},*/
/* 					});*/
/* 				});*/
/* 			</script>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
