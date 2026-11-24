<?php

/* extension/module/clocking/history.twig */
class __TwigTemplate_6fb5ec72c5494eea1939bc506d75c1daf24f3e4ddf673d284959f686c2c1a65b extends Twig_Template
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
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<h1><i class=\"fa ";
        // line 6
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1><br>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 9
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
        // line 11
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\">";
        // line 17
        echo (isset($context["text_report"]) ? $context["text_report"] : null);
        echo "<h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<table id=\"historytable\" class=\"display\" style=\"width:100%\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 24
            echo "\t\t\t\t\t\t\t\t<th>";
            echo $this->getAttribute($context["col"], "text", array());
            echo "</th>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr class=\"reduced column_search\">
\t\t\t\t\t\t\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["columns"]) ? $context["columns"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 29
            if (($this->getAttribute($context["col"], "search", array()) == "select")) {
                // line 30
                echo "\t\t\t\t\t\t\t\t\t<th style=\"padding: 0px; position: relative;\">
\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">All</option>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 33
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["col"], "options", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                    echo $this->getAttribute($context["opt"], $this->getAttribute($context["col"], "optionskey", array()), array(), "array");
                    echo "\">";
                    echo $this->getAttribute($context["opt"], $this->getAttribute($context["col"], "optionskey", array()), array(), "array");
                    echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t";
            } else {
                // line 39
                echo "\t\t\t\t\t\t\t\t\t<th style=\"padding: 0px; position: relative;\">
\t\t\t\t\t\t\t\t\t\t<input type=\"search\" class=\"form-control ";
                // line 40
                echo $this->getAttribute($context["col"], "search", array());
                echo "\">
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
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
\t\t\$('.daterange').each(function(){
\t\t\t\$(this).after('<i style=\"position: absolute; bottom: 10px; right: 24px; top: auto;\" class=\"far fa-calendar-alt\"></i>');
\t\t\t\$(this).daterangepicker(
\t\t\t\t{
\t\t\t\t\t\"showDropdowns\": true,
\t\t\t\t\t\"showWeekNumbers\": true,
\t\t\t\t\t\"ranges\": {
\t\t\t\t\t\t'Today':\t\t[moment(), moment()],
\t\t\t\t\t\t'Yesterday':\t[moment().subtract(1, 'days'), moment().subtract(1, 'days')],
\t\t\t\t\t\t'Last 7 Days':\t[moment().subtract(6, 'days'), moment()],
\t\t\t\t\t\t'Last 30 Days':\t[moment().subtract(29, 'days'), moment()],
\t\t\t\t\t\t'This Month':\t[moment().startOf('month'), moment().endOf('month')],
\t\t\t\t\t\t'Last Month':\t[moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
\t\t\t\t\t\t'This Year':\t[moment().startOf('year'), moment().endOf('year')]
\t\t\t\t\t},
\t\t\t\t\t\"locale\": {
\t\t\t\t\t\t\"format\": \"DD/MM/YYYY\",
\t\t\t\t\t},
\t\t\t\t\t\"showCustomRangeLabel\": false,
\t\t\t\t\t\"alwaysShowCalendars\": true,
\t\t\t\t\t\"startDate\": moment().startOf('year'),
\t\t\t\t\t\"endDate\": moment().endOf('year'),
\t\t\t\t\t\"opens\": \"left\",
\t\t\t\t},
\t\t\t\tfunction(start, end, label) {
\t\t\t\t\tconsole.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
\t\t\t\t}
\t\t\t);
\t\t});
\t\tvar dtable = \$('#historytable').DataTable( {
\t\t\tlanguage: { searchPlaceholder: \"Search All\" },
\t\t\tprocessing: true,
\t\t\tserverSide: true,
\t\t\torderCellsTop: true,
\t\t\tfixedHeader: true,
\t\t\tresponsive: true,
\t\t\tstateSave: true,
\t\t\tpageLength: 50,
\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\tajax: {
\t\t\t\turl: \"";
        // line 94
        echo (isset($context["ajax_route"]) ? $context["ajax_route"] : null);
        echo "\",
\t\t\t},
\t\t});
\t\t// Restore state
\t\tdtable.columns().eq( 0 ).each( function ( colIdx ) {
\t\t\tif(dtable.state.loaded()){
\t\t\t\tvar colSearch = dtable.state.loaded().columns[colIdx].search;
\t\t\t\tif ( colSearch.search ) {
\t\t\t\t\t\$(\"#historytable tr.column_search  th:nth-child(\"+(colIdx+1)+\")  input\" ).val( colSearch.search );
\t\t\t\t}
\t\t\t}
\t\t\t\$(\"#historytable tr.column_search > th:nth-child(\"+(colIdx+1)+\")  input, #historytable tr.column_search > th:nth-child(\"+(colIdx+1)+\")  select\" )
\t\t\t\t.each( function () {
\t\t\t\t\tdtable.column( \$(this).parent().index() ).search(this.value.replace(/;/g, \"|\"), true, false);
\t\t\t\t})
\t\t\t\t.on( 'keyup change search', function () {
\t\t\t\t\tdtable.column( \$(this).parent().index() ).search(this.value.replace(/;/g, \"|\"), true, false).draw();
\t\t\t\t});
\t\t});
\t\tdtable.draw();
\t\t
\t});
</script>
";
        // line 117
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "extension/module/clocking/history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 117,  184 => 94,  132 => 44,  126 => 43,  120 => 40,  117 => 39,  112 => 36,  101 => 34,  97 => 33,  92 => 30,  90 => 29,  84 => 28,  80 => 26,  71 => 24,  67 => 23,  58 => 17,  50 => 11,  39 => 9,  35 => 8,  28 => 6,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* */
/* <div id="content">*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<h1><i class="fa {{ heading_icon }}"></i>&nbsp;{{ heading_title }}</h1><br>*/
/* 			<ul class="breadcrumb">*/
/* 				{% for breadcrumb in breadcrumbs %}*/
/* 				<li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text }}</a></li>*/
/* 				{% endfor %}*/
/* 			</ul>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div class="container-fluid">*/
/* 		<div class="panel panel-default">*/
/* 			<div class="panel-heading">*/
/* 				<h3 class="panel-title">{{ text_report }}<h3>*/
/* 			</div>*/
/* 			<div class="panel-body">*/
/* 				<table id="historytable" class="display" style="width:100%">*/
/* 					<thead>*/
/* 						<tr>*/
/* 							{% for col in columns %}*/
/* 								<th>{{col.text}}</th>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 						<tr class="reduced column_search">*/
/* 							{% for col in columns %}							*/
/* 								{% if col.search == 'select' %}*/
/* 									<th style="padding: 0px; position: relative;">*/
/* 										<select class="form-control">*/
/* 											<option value="">All</option>*/
/* 											{% for opt in col.options %}*/
/* 												<option value="{{opt[col.optionskey]}}">{{opt[col.optionskey]}}</option>*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 									</th>*/
/* 								{% else %}*/
/* 									<th style="padding: 0px; position: relative;">*/
/* 										<input type="search" class="form-control {{col.search}}">*/
/* 									</th>*/
/* 								{% endif %}*/
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
/* 		$('.daterange').each(function(){*/
/* 			$(this).after('<i style="position: absolute; bottom: 10px; right: 24px; top: auto;" class="far fa-calendar-alt"></i>');*/
/* 			$(this).daterangepicker(*/
/* 				{*/
/* 					"showDropdowns": true,*/
/* 					"showWeekNumbers": true,*/
/* 					"ranges": {*/
/* 						'Today':		[moment(), moment()],*/
/* 						'Yesterday':	[moment().subtract(1, 'days'), moment().subtract(1, 'days')],*/
/* 						'Last 7 Days':	[moment().subtract(6, 'days'), moment()],*/
/* 						'Last 30 Days':	[moment().subtract(29, 'days'), moment()],*/
/* 						'This Month':	[moment().startOf('month'), moment().endOf('month')],*/
/* 						'Last Month':	[moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],*/
/* 						'This Year':	[moment().startOf('year'), moment().endOf('year')]*/
/* 					},*/
/* 					"locale": {*/
/* 						"format": "DD/MM/YYYY",*/
/* 					},*/
/* 					"showCustomRangeLabel": false,*/
/* 					"alwaysShowCalendars": true,*/
/* 					"startDate": moment().startOf('year'),*/
/* 					"endDate": moment().endOf('year'),*/
/* 					"opens": "left",*/
/* 				},*/
/* 				function(start, end, label) {*/
/* 					console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');*/
/* 				}*/
/* 			);*/
/* 		});*/
/* 		var dtable = $('#historytable').DataTable( {*/
/* 			language: { searchPlaceholder: "Search All" },*/
/* 			processing: true,*/
/* 			serverSide: true,*/
/* 			orderCellsTop: true,*/
/* 			fixedHeader: true,*/
/* 			responsive: true,*/
/* 			stateSave: true,*/
/* 			pageLength: 50,*/
/* 			lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 			ajax: {*/
/* 				url: "{{ ajax_route }}",*/
/* 			},*/
/* 		});*/
/* 		// Restore state*/
/* 		dtable.columns().eq( 0 ).each( function ( colIdx ) {*/
/* 			if(dtable.state.loaded()){*/
/* 				var colSearch = dtable.state.loaded().columns[colIdx].search;*/
/* 				if ( colSearch.search ) {*/
/* 					$("#historytable tr.column_search  th:nth-child("+(colIdx+1)+")  input" ).val( colSearch.search );*/
/* 				}*/
/* 			}*/
/* 			$("#historytable tr.column_search > th:nth-child("+(colIdx+1)+")  input, #historytable tr.column_search > th:nth-child("+(colIdx+1)+")  select" )*/
/* 				.each( function () {*/
/* 					dtable.column( $(this).parent().index() ).search(this.value.replace(/;/g, "|"), true, false);*/
/* 				})*/
/* 				.on( 'keyup change search', function () {*/
/* 					dtable.column( $(this).parent().index() ).search(this.value.replace(/;/g, "|"), true, false).draw();*/
/* 				});*/
/* 		});*/
/* 		dtable.draw();*/
/* 		*/
/* 	});*/
/* </script>*/
/* {{ footer }}*/
/* */
/* */
