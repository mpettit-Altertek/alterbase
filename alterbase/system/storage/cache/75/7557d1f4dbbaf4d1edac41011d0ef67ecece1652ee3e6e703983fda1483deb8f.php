<?php

/* extension/MRP/supplierlist.twig */
class __TwigTemplate_daeba3f50ba1453002adf87afefbe07bc2dd6a3eb148c9a44b084a75ee169a3b extends Twig_Template
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
\t.pull-right {
\t\tpadding-bottom: 10px;
\t}
\tinput[type=\"search\"]::-webkit-search-cancel-button {
\t\t-webkit-appearance: searchfield-cancel-button;
\t}
\t</style>
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<a href=\"";
        // line 18
        echo (isset($context["new"]) ? $context["new"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_new"]) ? $context["button_new"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i></a>
\t\t\t</div>
\t\t\t<h1><i class=\"fa ";
        // line 20
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1><br>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 23
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
        // line 25
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 29
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 30
            echo "\t\t<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t</div>
\t\t";
        }
        // line 34
        echo "\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-body\">
\t\t\t
\t\t\t\t<table id=\"Suppliertable\" class=\"display\" style=\"width:100%\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>";
        // line 40
        echo (isset($context["entry_id"]) ? $context["entry_id"] : null);
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
\t\t\t\t\t</thead>
\t\t\t\t</table>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>
\t\$(document).ready(function() {

\t\t\$('#Suppliertable').DataTable( {
\t\t\tcolumnDefs: [
\t\t\t\t{\ttargets: [1],\tvisible: true,},
\t\t\t\t{\ttargets: '_all',
\t\t\t\t\tvisible: false,
\t\t\t\t\trender: function ( data, type, row, meta ) {
\t\t\t\t\t\treturn '<a\thref=\"";
        // line 61
        echo (isset($context["viewpath"]) ? $context["viewpath"] : null);
        echo "&id='+row[0]+'\">'+data+'</a>';
\t\t\t\t\t},
\t\t\t\t},
\t\t\t],
\t\t\tdom: 'lBfrtip',
\t\t\tbuttons: [
\t\t\t\t'colvis',
\t\t\t],
\t\t\tcolReorder: true,
\t\t\tprocessing: true,
\t\t\tserverSide: true,
\t\t\tfixedHeader: true,
\t\t\tresponsive: true,
\t\t\tstateSave: true,
\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\tajax: \"";
        // line 76
        echo (isset($context["ajax_route"]) ? $context["ajax_route"] : null);
        echo "\",
\t\t} );
\t\t\$('#example').DataTable()
\t\t\t.columns.adjust()
\t\t\t.responsive.recalc();
\t\t
\t} );
</script>
";
        // line 84
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/MRP/supplierlist.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 84,  150 => 76,  132 => 61,  114 => 45,  105 => 43,  101 => 42,  97 => 41,  93 => 40,  85 => 34,  77 => 30,  75 => 29,  69 => 25,  58 => 23,  54 => 22,  47 => 20,  40 => 18,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* <div id="content">*/
/* 	<style>*/
/* 	div.dt-buttons {*/
/* 		float: right;*/
/* 		margin-left: 5px;*/
/* 	}*/
/* 	.pull-right {*/
/* 		padding-bottom: 10px;*/
/* 	}*/
/* 	input[type="search"]::-webkit-search-cancel-button {*/
/* 		-webkit-appearance: searchfield-cancel-button;*/
/* 	}*/
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
/* 				<table id="Suppliertable" class="display" style="width:100%">*/
/* 					<thead>*/
/* 						<tr>*/
/* 							<th>{{entry_id}}</th>*/
/* 							<th>{{entry_name}}</th>*/
/* 							{% for field in fields %}*/
/* 								<th>{{ field.name|replace({'_': ' '}) }}</th>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 					</thead>*/
/* 				</table>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <script>*/
/* 	$(document).ready(function() {*/
/* */
/* 		$('#Suppliertable').DataTable( {*/
/* 			columnDefs: [*/
/* 				{	targets: [1],	visible: true,},*/
/* 				{	targets: '_all',*/
/* 					visible: false,*/
/* 					render: function ( data, type, row, meta ) {*/
/* 						return '<a	href="{{viewpath}}&id='+row[0]+'">'+data+'</a>';*/
/* 					},*/
/* 				},*/
/* 			],*/
/* 			dom: 'lBfrtip',*/
/* 			buttons: [*/
/* 				'colvis',*/
/* 			],*/
/* 			colReorder: true,*/
/* 			processing: true,*/
/* 			serverSide: true,*/
/* 			fixedHeader: true,*/
/* 			responsive: true,*/
/* 			stateSave: true,*/
/* 			lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 			ajax: "{{ ajax_route }}",*/
/* 		} );*/
/* 		$('#example').DataTable()*/
/* 			.columns.adjust()*/
/* 			.responsive.recalc();*/
/* 		*/
/* 	} );*/
/* </script>*/
/* {{ footer }}*/
/* */
