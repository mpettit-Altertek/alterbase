<?php

/* extension/MRP/productlist.twig */
class __TwigTemplate_8353761521967c63081ed4565839939d4fdd9178009f161bcaae49e4bd008d41 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
\t<style>
\tdiv.dt-buttons {
\t\tfloat: right;
\t\tmargin-left: 5px;
\t}
\tinput[type=\"search\"]::-webkit-search-cancel-button {
\t\t-webkit-appearance: searchfield-cancel-button;
\t}

\t</style>
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<a href=\"";
        // line 16
        echo (isset($context["new"]) ? $context["new"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_new"]) ? $context["button_new"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i></a>
\t\t\t</div>
\t\t\t<h1><i class=\"fa ";
        // line 18
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1><br>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 21
            echo "\t\t\t\t<li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 27
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 28
            echo "\t\t<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 32
        echo "\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-body\">
\t\t\t
\t\t\t\t<table id=\"parttable\" class=\"display\" style=\"width:100%\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th class=\"nosearch\">";
        // line 38
        echo (isset($context["entry_icon"]) ? $context["entry_icon"] : null);
        echo "</th>
\t\t\t\t\t\t\t<th>";
        // line 39
        echo (isset($context["entry_partno"]) ? $context["entry_partno"] : null);
        echo "</th>
\t\t\t\t\t\t\t<th>";
        // line 40
        echo (isset($context["entry_rev"]) ? $context["entry_rev"] : null);
        echo "</th>
\t\t\t\t\t\t\t<th>";
        // line 41
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</th>
\t\t\t\t\t\t\t";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 43
            echo "\t\t\t\t\t\t\t\t<th>";
            echo twig_replace_filter($this->getAttribute($context["field"], "name", array()), array("_" => " "));
            echo "</th>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr class=\"reduced column_search\">
\t\t\t\t\t\t\t<th style=\"padding: 0px;\" class=\"nosearch\"></th>
\t\t\t\t\t\t\t<th style=\"padding: 0px;\"></th>
\t\t\t\t\t\t\t<th style=\"padding: 0px;\"></th>
\t\t\t\t\t\t\t<th style=\"padding: 0px;\"></th>
\t\t\t\t\t\t\t";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 52
            echo "\t\t\t\t\t\t\t\t<th style=\"padding: 0px;\"></th>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody></tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>
\t\$(document).ready(function() {

\t\t\$('#parttable .column_search th:not(.nosearch)').each( function () {
\t\t\t\$(this).html( '<input type=\"search\" placeholder=\"Search\"/>' );
\t\t} );
\t\tvar dtable = \$('#parttable').DataTable( {
\t\t\tcolumnDefs: [
\t\t\t\t{\ttargets: [0],\tvisible: true,\tsearchable: false,\torderable: false},
\t\t\t\t{\ttargets: [3],\tvisible: true,\twidth:\"100%\",\t},
\t\t\t\t{\ttargets: [1,2],\tvisible: true,\t},
\t\t\t\t{\ttargets: '_all',
\t\t\t\t\tvisible: false,
\t\t\t\t\trender: function ( data, type, row, meta ) {
\t\t\t\t\t\treturn '<a\thref=\"";
        // line 76
        echo (isset($context["viewpath"]) ? $context["viewpath"] : null);
        echo "&id='+row[1]+'&rev='+row[2]+'\">'+data+'</a>';
\t\t\t\t\t},
\t\t\t\t},
\t\t\t],
\t\t\torder: [[ 1, \"asc\" ]],
\t\t\tlanguage: { searchPlaceholder: \"Search All\" },
\t\t\tsearch: {regex: true,},
\t\t\tdom: 'lBfrtip',
\t\t\tbuttons: [
\t\t\t\t'colvis',
\t\t\t\t{
\t\t\t\t\ttext: '";
        // line 87
        echo (isset($context["latest_only"]) ? $context["latest_only"] : null);
        echo "',
\t\t\t\t\tattr:  {
\t\t\t\t\t\tid: 'latest_only',
\t\t\t\t\t},
\t\t\t\t\taction: function ( e, dt, node, config ) {
\t\t\t\t\t\t\$(\"#latest_only\").toggleClass(\"ui-state-default ui-state-active\");
\t\t\t\t\t\tdt.ajax.reload();
\t\t\t\t\t}
\t\t\t\t},
\t\t\t],
\t\t\tcolReorder: true,
\t\t\tprocessing: true,
\t\t\tserverSide: true,
\t\t\torderCellsTop: true,
\t\t\tfixedHeader: true,
\t\t\tresponsive: true,
\t\t\tstateSave: true,
\t\t\tpageLength: 100,
\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\tajax: {
\t\t\t\turl: \"";
        // line 107
        echo (isset($context["ajax_route"]) ? $context["ajax_route"] : null);
        echo "\",
\t\t\t\tdata: function ( d ) {
\t\t\t\t\td.latest_only = \$(\"#latest_only\").hasClass( \"ui-state-active\" );
\t\t\t\t}
\t\t\t},
\t\t});
\t\t// Restore state
\t\tdtable.columns().eq( 0 ).each( function ( colIdx ) {
\t\t\tif(dtable.state.loaded()){
\t\t\t\tvar colSearch = dtable.state.loaded().columns[colIdx].search;
\t\t\t\tif ( colSearch.search ) {
\t\t\t\t\t\$(\"#parttable tr.column_search  th:nth-child(\"+(colIdx+1)+\")  input\" ).val( colSearch.search );
\t\t\t\t}
\t\t\t}
\t\t\t\$(\"#parttable tr.column_search > th:nth-child(\"+(colIdx+1)+\") > input[type=search]\" )
\t\t\t\t.keypress(function(event) {
\t\t\t\t\tif (event.keyCode == 13) {
\t\t\t\t\t\tdtable.column( \$(this).parent().index() ).search(this.value.replace(/;/g, \"|\"), true, false).draw();
\t\t\t\t\t}
\t\t\t\t})
\t\t\t\t.focusout(function(event) {
\t\t\t\t\tdtable.column( \$(this).parent().index() ).search(this.value.replace(/;/g, \"|\"), true, false).draw();
\t\t\t\t})
\t\t});
\t\t
\t\t\$('#parttable').on( 'column-visibility.dt', function ( e, settings, column, state ) {
\t\t\tdtable.columns().eq( 0 ).each( function ( colIdx ) {
\t\t\t\tif(dtable.state.loaded()){
\t\t\t\t\tvar colSearch = dtable.state.loaded().columns[colIdx].search;
\t\t\t\t\tif ( colSearch.search ) {
\t\t\t\t\t\t\$(\"#parttable tr.column_search  th:nth-child(\"+(colIdx+1)+\")  input\" ).val( colSearch.search );
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t\$(\"#parttable tr.column_search > th:nth-child(\"+(colIdx+1)+\") > input[type=search]\" ).keypress(function(event) {
\t\t\t\t\tif (event.keyCode == 13) {
\t\t\t\t\t\tdtable.column( \$(this).parent().index() ).search(this.value.replace(/;/g, \"|\"), true, false).draw();
\t\t\t\t\t}
\t\t\t\t});
\t\t\t});
\t\t} );
\t\t
\t\t\$(\"#parttable_filter > label > input[type=search]\").attr(\"data-toggle\", \"tooltip\").attr(\"title\", \"";
        // line 148
        echo (isset($context["Gsearchre"]) ? $context["Gsearchre"] : null);
        echo "\");
\t\t\$(\"#parttable tr.column_search input[type=search]\").attr(\"data-toggle\", \"tooltip\").attr(\"title\", \"";
        // line 149
        echo (isset($context["Csearchre"]) ? $context["Csearchre"] : null);
        echo "\");
\t});
</script>
";
        // line 152
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productlist.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 152,  248 => 149,  244 => 148,  200 => 107,  177 => 87,  163 => 76,  139 => 54,  132 => 52,  128 => 51,  120 => 45,  111 => 43,  107 => 42,  103 => 41,  99 => 40,  95 => 39,  91 => 38,  83 => 32,  75 => 28,  73 => 27,  67 => 23,  56 => 21,  52 => 20,  45 => 18,  38 => 16,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/* 	<style>*/
/* 	div.dt-buttons {*/
/* 		float: right;*/
/* 		margin-left: 5px;*/
/* 	}*/
/* 	input[type="search"]::-webkit-search-cancel-button {*/
/* 		-webkit-appearance: searchfield-cancel-button;*/
/* 	}*/
/* */
/* 	</style>*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				<a href="{{ new }}" data-toggle="tooltip" title="{{ button_new }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>*/
/* 			</div>*/
/* 			<h1><i class="fa {{ heading_icon }}"></i>&nbsp;{{ heading_title }}</h1><br>*/
/* 			<ul class="breadcrumb">*/
/* 				{% for breadcrumb in breadcrumbs %}*/
/* 				<li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/* 				{% endfor %}*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid">*/
/* 		{% if error_warning %}*/
/* 		<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/* 			<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 		</div>*/
/* 		{% endif %}*/
/* 		<div class="panel panel-default">*/
/* 			<div class="panel-body">*/
/* 			*/
/* 				<table id="parttable" class="display" style="width:100%">*/
/* 					<thead>*/
/* 						<tr>*/
/* 							<th class="nosearch">{{entry_icon}}</th>*/
/* 							<th>{{entry_partno}}</th>*/
/* 							<th>{{entry_rev}}</th>*/
/* 							<th>{{entry_name}}</th>*/
/* 							{% for field in fields %}*/
/* 								<th>{{ field.name|replace({'_': ' '}) }}</th>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 						<tr class="reduced column_search">*/
/* 							<th style="padding: 0px;" class="nosearch"></th>*/
/* 							<th style="padding: 0px;"></th>*/
/* 							<th style="padding: 0px;"></th>*/
/* 							<th style="padding: 0px;"></th>*/
/* 							{% for field in fields %}*/
/* 								<th style="padding: 0px;"></th>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 					</thead>*/
/* 					<tbody></tbody>*/
/* 				</table>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <script>*/
/* 	$(document).ready(function() {*/
/* */
/* 		$('#parttable .column_search th:not(.nosearch)').each( function () {*/
/* 			$(this).html( '<input type="search" placeholder="Search"/>' );*/
/* 		} );*/
/* 		var dtable = $('#parttable').DataTable( {*/
/* 			columnDefs: [*/
/* 				{	targets: [0],	visible: true,	searchable: false,	orderable: false},*/
/* 				{	targets: [3],	visible: true,	width:"100%",	},*/
/* 				{	targets: [1,2],	visible: true,	},*/
/* 				{	targets: '_all',*/
/* 					visible: false,*/
/* 					render: function ( data, type, row, meta ) {*/
/* 						return '<a	href="{{viewpath}}&id='+row[1]+'&rev='+row[2]+'">'+data+'</a>';*/
/* 					},*/
/* 				},*/
/* 			],*/
/* 			order: [[ 1, "asc" ]],*/
/* 			language: { searchPlaceholder: "Search All" },*/
/* 			search: {regex: true,},*/
/* 			dom: 'lBfrtip',*/
/* 			buttons: [*/
/* 				'colvis',*/
/* 				{*/
/* 					text: '{{latest_only}}',*/
/* 					attr:  {*/
/* 						id: 'latest_only',*/
/* 					},*/
/* 					action: function ( e, dt, node, config ) {*/
/* 						$("#latest_only").toggleClass("ui-state-default ui-state-active");*/
/* 						dt.ajax.reload();*/
/* 					}*/
/* 				},*/
/* 			],*/
/* 			colReorder: true,*/
/* 			processing: true,*/
/* 			serverSide: true,*/
/* 			orderCellsTop: true,*/
/* 			fixedHeader: true,*/
/* 			responsive: true,*/
/* 			stateSave: true,*/
/* 			pageLength: 100,*/
/* 			lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 			ajax: {*/
/* 				url: "{{ ajax_route }}",*/
/* 				data: function ( d ) {*/
/* 					d.latest_only = $("#latest_only").hasClass( "ui-state-active" );*/
/* 				}*/
/* 			},*/
/* 		});*/
/* 		// Restore state*/
/* 		dtable.columns().eq( 0 ).each( function ( colIdx ) {*/
/* 			if(dtable.state.loaded()){*/
/* 				var colSearch = dtable.state.loaded().columns[colIdx].search;*/
/* 				if ( colSearch.search ) {*/
/* 					$("#parttable tr.column_search  th:nth-child("+(colIdx+1)+")  input" ).val( colSearch.search );*/
/* 				}*/
/* 			}*/
/* 			$("#parttable tr.column_search > th:nth-child("+(colIdx+1)+") > input[type=search]" )*/
/* 				.keypress(function(event) {*/
/* 					if (event.keyCode == 13) {*/
/* 						dtable.column( $(this).parent().index() ).search(this.value.replace(/;/g, "|"), true, false).draw();*/
/* 					}*/
/* 				})*/
/* 				.focusout(function(event) {*/
/* 					dtable.column( $(this).parent().index() ).search(this.value.replace(/;/g, "|"), true, false).draw();*/
/* 				})*/
/* 		});*/
/* 		*/
/* 		$('#parttable').on( 'column-visibility.dt', function ( e, settings, column, state ) {*/
/* 			dtable.columns().eq( 0 ).each( function ( colIdx ) {*/
/* 				if(dtable.state.loaded()){*/
/* 					var colSearch = dtable.state.loaded().columns[colIdx].search;*/
/* 					if ( colSearch.search ) {*/
/* 						$("#parttable tr.column_search  th:nth-child("+(colIdx+1)+")  input" ).val( colSearch.search );*/
/* 					}*/
/* 				}*/
/* 				$("#parttable tr.column_search > th:nth-child("+(colIdx+1)+") > input[type=search]" ).keypress(function(event) {*/
/* 					if (event.keyCode == 13) {*/
/* 						dtable.column( $(this).parent().index() ).search(this.value.replace(/;/g, "|"), true, false).draw();*/
/* 					}*/
/* 				});*/
/* 			});*/
/* 		} );*/
/* 		*/
/* 		$("#parttable_filter > label > input[type=search]").attr("data-toggle", "tooltip").attr("title", "{{Gsearchre}}");*/
/* 		$("#parttable tr.column_search input[type=search]").attr("data-toggle", "tooltip").attr("title", "{{Csearchre}}");*/
/* 	});*/
/* </script>*/
/* {{ footer }}*/
/* */
/* */
