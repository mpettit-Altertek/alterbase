<?php

/* extension/MRP/supplierview.twig */
class __TwigTemplate_9677808be2ff51b9fc338968a745245934c261621e9776520ce2019dab86d7bd extends Twig_Template
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
\t\t.editactionbutton{
\t\t\tdisplay:none;
\t\t}
\t\ttextarea {
\t\t\twhite-space: pre;
\t\t\toverflow: hidden;
\t\t\tresize: none;
\t\t}
\t\t#buttons{
\t\t\tdisplay: inline-block;
\t\t}
\t</style>
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<button type=\"submit\"\t\tform=\"form-record\"\t\tdata-toggle=\"tooltip\" title=\"";
        // line 20
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\"\t\t\tclass=\"btn btn-primary editactionbutton\"><i class=\"fa fa-save\"></i></button>
\t\t\t\t<div id=\"buttons\">
\t\t\t\t\t<button type=\"button\"\t\tid=\"editlocked\"\t\t\tdata-toggle=\"tooltip\" title=\"";
        // line 22
        echo (isset($context["button_enable_edit"]) ? $context["button_enable_edit"] : null);
        echo "\"\tclass=\"btn btn-primary\"\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_enable_edit_icon"]) ? $context["button_enable_edit_icon"] : null);
        echo "\"></i></button>
\t\t\t\t\t<button type=\"button\"\t\tid=\"editopen\"\t\t\tdata-toggle=\"tooltip\" title=\"";
        // line 23
        echo (isset($context["button_disable_edit"]) ? $context["button_disable_edit"] : null);
        echo "\"\tclass=\"btn btn-primary\"\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_disable_edit_icon"]) ? $context["button_disable_edit_icon"] : null);
        echo "\"></i></button>
\t\t\t\t\t<a href=\"#history-popup\"\tid=\"open_history-popup\"\tdata-toggle=\"tooltip\" title=\"";
        // line 24
        echo (isset($context["button_history"]) ? $context["button_history"] : null);
        echo "\"\t\tclass=\"btn btn-primary\"\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_history_icon"]) ? $context["button_history_icon"] : null);
        echo "\"></i></a>
\t\t\t\t</div>
\t\t\t\t<a href=\"";
        // line 26
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\"\t\t\t\t\t\t\t\tdata-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\"\t\tclass=\"btn btn-default\"\t\t\t\t\t><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1><i class=\"fa ";
        // line 28
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1><br>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 31
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
        // line 33
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 37
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 38
            echo "\t\t\t<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t</div>
\t\t";
        }
        // line 42
        echo "\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\"><i class=\"fa fa-edit\"></i> ";
        // line 44
        echo (isset($context["text_view_details"]) ? $context["text_view_details"] : null);
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form action=\"";
        // line 47
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-record\" class=\"form-horizontal\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-id\">";
        // line 49
        echo (isset($context["entry_id"]) ? $context["entry_id"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<div class=\"form-control\" disabled>";
        // line 51
        echo (isset($context["dispid"]) ? $context["dispid"] : null);
        echo "</div>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 52
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 56
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<textarea name=\"fields[name]\" id=\"input-name\" class=\"form-control\" >";
        // line 58
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 63
            echo "\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-";
            // line 64
            echo $this->getAttribute($context["field"], "name", array());
            echo "\">";
            echo twig_replace_filter($this->getAttribute($context["field"], "name", array()), array("_" => " "));
            echo "</label>
\t\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t\t";
            // line 66
            if (($this->getAttribute($context["field"], "type", array()) == 1)) {
                // line 67
                echo "\t\t\t\t\t\t\t\t\t<textarea name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" placeholder=\"";
                echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
                echo "\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control\">";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "</textarea>
\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 68
$context["field"], "type", array()) == 2)) {
                // line 69
                echo "\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\" />
\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 70
$context["field"], "type", array()) == 3)) {
                // line 71
                echo "\t\t\t\t\t\t\t\t\t<select  name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t";
                // line 72
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                    // line 73
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    if (($context["k"] == $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array"))) {
                        // line 74
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $context["k"];
                        echo "\" selected >";
                        echo $context["v"];
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 76
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $context["k"];
                        echo "\" >";
                        echo $context["v"];
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 79
                echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 80
$context["field"], "type", array()) == 4)) {
                // line 81
                echo "\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control datepicker\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\" />
\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 82
$context["field"], "type", array()) == 5)) {
                // line 83
                echo "\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control masked\" data-inputmask-regex=\"£[0-9]{1,}\\.[0-9]{2,}\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\" />
\t\t\t\t\t\t\t\t";
            }
            // line 85
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div id=\"history-popup\" class=\"white-popup mfp-hide panel panel-default\">
\t<div class=\"panel-heading\">
\t\t<h3 class=\"panel-title\"><i class=\"fa fa-history\"></i> ";
        // line 95
        echo (isset($context["text_history"]) ? $context["text_history"] : null);
        echo "</h3>
\t</div>
\t<div class=\"panel-body\">
\t\t<table id=\"historytable\" class=\"display\" style=\"width:100%\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>";
        // line 101
        echo (isset($context["entry_date"]) ? $context["entry_date"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 102
        echo (isset($context["entry_user"]) ? $context["entry_user"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 103
        echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 104
        echo (isset($context["entry_oldval"]) ? $context["entry_oldval"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 105
        echo (isset($context["entry_newval"]) ? $context["entry_newval"] : null);
        echo "</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t</table>
\t</div>
</div>

<script>
\t\$(document).ready(function() {
\t\t\$( \".datepicker\" ).datepicker({ dateFormat: 'dd/mm/yy' });
\t\t
\t\tfunction autoresize(textarea) {
\t\t\ttextarea.style.height = '0px';     //Reset height, so that it not only grows but also shrinks
\t\t\tvar newheight = (textarea.scrollHeight+2);
\t\t\tif(newheight<36) {newheight=36;}
\t\t\ttextarea.style.height = newheight + 'px';    //Set new height
\t\t}
\t\t
\t\tfunction formfuncs (){
\t\t\t\$('textarea').each(function ()\t{ autoresize(this);\t});
\t\t\t\$('textarea').keyup(function ()\t{ autoresize(this);\t});
\t\t\t\$('textarea').keydown(function (e) {
\t\t\t\t<!-- Allow only alphanumeric -->
\t\t\t\tvar k = e.which;
\t\t\t\tvar ok =(( k >= 65 && k <=  90\t\t\t\t) || // A-Z
\t\t\t\t\t\t ( k >= 96 && k <= 105\t\t\t\t) || // a-z
\t\t\t\t\t\t ( k >= 35 && k <=  40\t\t\t\t) || // arrows
\t\t\t\t\t\t ( k ==  8 || k == 46\t\t\t\t) || // Backspaces
\t\t\t\t\t\t (!e.shiftKey && k >= 48 && k <= 57\t) ); // 0-9
\t\t\t\tif(!ok){
\t\t\t\t\te.preventDefault();
\t\t\t\t}
\t\t\t});

\t\t\t\$(\".datepicker\").datepicker();
\t\t\t\$(\".masked\").inputmask();
\t\t\t\$('input, select, textarea').on('change', function() {
\t\t\t\t\$(this).addClass('changed');
\t\t\t});
\t\t\t\$('form').on('submit', function(e) {
\t\t\t\t\$('select').prop('disabled',false);
\t\t\t\t";
        // line 146
        if ( !(null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 147
            echo "\t\t\t\t\t\$('input[type!=\"hidden\"]:not([required]):not(.changed), textarea:not([required]):not(.changed), select:not([required]):not(.changed)').prop('disabled', true);
\t\t\t\t";
        }
        // line 149
        echo "\t\t\t\tvar nchanged = (\$('.changed').length == 0);
\t\t\t\tif(nchanged){
\t\t\t\t\te.preventDefault();
\t\t\t\t\t\$('input, textarea, select').prop('disabled', false);
\t\t\t\t\t\$(\"#editopen\").trigger( \"click\" );
\t\t\t\t}
\t\t\t});
\t\t
\t\t}
\t\tformfuncs();

\t\t\$(\"#editlocked\").click( function(){
\t\t\t\$(\"#editlocked\").hide();
\t\t\t\$(\"#editopen\").show();
\t\t\t\$(\".editactionbutton\").show();
\t\t\t\$('input, select, textarea').prop('readonly', false);
\t\t\t\$('select').prop('disabled', false);
\t\t});
\t\t\$(\"#editopen\").click( function(){
\t\t\t\$(\"#editlocked\").show();
\t\t\t\$(\"#editopen\").hide();
\t\t\t\$(\".editactionbutton\").hide();
\t\t\t\$('input, textarea').prop('readonly', true);
\t\t\t\$('select').prop('disabled', true);
\t\t\t\$('form').each (function(){  
\t\t\t\tthis.reset();
\t\t\t}); 
\t\t});
\t\t";
        // line 177
        if ( !(null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 178
            echo "\t\t\t\$(\"#editopen\").trigger( \"click\" );
\t\t";
        } else {
            // line 180
            echo "\t\t\t\$(\"#editlocked\").trigger( \"click\" );
\t\t\t\$(\"#buttons\").hide();
\t\t";
        }
        // line 183
        echo "\t\t
\t\t\$('#open_history-popup').magnificPopup({
\t\t\ttype:'inline',
\t\t\tcloseOnBgClick: false,
\t\t\tmidClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
\t\t\tcallbacks: {
\t\t\t\topen: function() {
\t\t\t\t\tconsole.log('Popup is opened');
\t\t\t\t\t\$('#historytable').DataTable( {
\t\t\t\t\t\tprocessing: true,
\t\t\t\t\t\tserverSide: true,
\t\t\t\t\t\tfixedHeader: true,
\t\t\t\t\t\tdestroy: true,
\t\t\t\t\t\tlengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, \"ALL\"] ],
\t\t\t\t\t\tajax: \"";
        // line 197
        echo (isset($context["ajax_route_history"]) ? $context["ajax_route_history"] : null);
        echo "\",
\t\t\t\t\t} );
\t\t\t\t},
\t\t\t},
\t\t});
\t} );
</script>
";
        // line 204
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "extension/MRP/supplierview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 204,  405 => 197,  389 => 183,  384 => 180,  380 => 178,  378 => 177,  348 => 149,  344 => 147,  342 => 146,  298 => 105,  294 => 104,  290 => 103,  286 => 102,  282 => 101,  273 => 95,  264 => 88,  256 => 85,  246 => 83,  244 => 82,  235 => 81,  233 => 80,  230 => 79,  224 => 78,  216 => 76,  208 => 74,  205 => 73,  201 => 72,  194 => 71,  192 => 70,  183 => 69,  181 => 68,  170 => 67,  168 => 66,  161 => 64,  158 => 63,  154 => 62,  147 => 58,  142 => 56,  135 => 52,  131 => 51,  126 => 49,  121 => 47,  115 => 44,  111 => 42,  103 => 38,  101 => 37,  95 => 33,  84 => 31,  80 => 30,  73 => 28,  66 => 26,  59 => 24,  53 => 23,  47 => 22,  42 => 20,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* */
/* <div id="content">*/
/* 	<style>*/
/* 		.editactionbutton{*/
/* 			display:none;*/
/* 		}*/
/* 		textarea {*/
/* 			white-space: pre;*/
/* 			overflow: hidden;*/
/* 			resize: none;*/
/* 		}*/
/* 		#buttons{*/
/* 			display: inline-block;*/
/* 		}*/
/* 	</style>*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				<button type="submit"		form="form-record"		data-toggle="tooltip" title="{{ button_save }}"			class="btn btn-primary editactionbutton"><i class="fa fa-save"></i></button>*/
/* 				<div id="buttons">*/
/* 					<button type="button"		id="editlocked"			data-toggle="tooltip" title="{{ button_enable_edit }}"	class="btn btn-primary"					><i class="fa {{button_enable_edit_icon}}"></i></button>*/
/* 					<button type="button"		id="editopen"			data-toggle="tooltip" title="{{ button_disable_edit }}"	class="btn btn-primary"					><i class="fa {{button_disable_edit_icon}}"></i></button>*/
/* 					<a href="#history-popup"	id="open_history-popup"	data-toggle="tooltip" title="{{ button_history }}"		class="btn btn-primary"					><i class="fa {{button_history_icon}}"></i></a>*/
/* 				</div>*/
/* 				<a href="{{ cancel }}"								data-toggle="tooltip" title="{{ button_cancel }}"		class="btn btn-default"					><i class="fa fa-reply"></i></a>*/
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
/* 			<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}*/
/* 				<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 			</div>*/
/* 		{% endif %}*/
/* 		<div class="panel panel-default">*/
/* 			<div class="panel-heading">*/
/* 				<h3 class="panel-title"><i class="fa fa-edit"></i> {{ text_view_details }}</h3>*/
/* 			</div>*/
/* 			<div class="panel-body">*/
/* 				<form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-record" class="form-horizontal">*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-2 control-label" for="input-id">{{ entry_id }}</label>*/
/* 						<div class="col-sm-10">*/
/* 							<div class="form-control" disabled>{{ dispid }}</div>*/
/* 							<input type="hidden" name="id" value="{{ id }}" />*/
/* 						</div>*/
/* 					</div>*/
/* 					<div class="form-group">*/
/* 						<label class="col-sm-2 control-label" for="input-name">{{ entry_name }}</label>*/
/* 						<div class="col-sm-10">*/
/* 							<textarea name="fields[name]" id="input-name" class="form-control" >{{ name }}</textarea>*/
/* 						</div>*/
/* 					</div>*/
/* 					*/
/* 					{% for field in fields %}*/
/* 						<div class="form-group">*/
/* 							<label class="col-sm-2 control-label" for="input-{{ field.name }}">{{ field.name|replace({'_': ' '}) }}</label>*/
/* 							<div class="col-sm-10">*/
/* 								{% if field.type == 1 %}*/
/* 									<textarea name="fields[{{ field.name }}]" placeholder="{{ entry_field }}" id="input-{{ field.name }}" class="form-control">{{ field_data[field.name] }}</textarea>*/
/* 								{% elseif field.type == 2 %}*/
/* 									<input type="number" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control" value="{{ field_data[field.name] }}" />*/
/* 								{% elseif field.type == 3 %}*/
/* 									<select  name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control">*/
/* 										{% for k,v in field.options %}*/
/* 											{% if k == field_data[field.name] %}*/
/* 												<option value="{{k}}" selected >{{v}}</option>*/
/* 											{% else %}*/
/* 												<option value="{{k}}" >{{v}}</option>*/
/* 											{% endif %}*/
/* 										{% endfor %}*/
/* 									</select>*/
/* 								{% elseif field.type == 4 %}*/
/* 									<input type="text" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control datepicker" value="{{ field_data[field.name] }}" />*/
/* 								{% elseif field.type == 5 %}*/
/* 									<input type="text" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control masked" data-inputmask-regex="£[0-9]{1,}\.[0-9]{2,}" value="{{ field_data[field.name] }}" />*/
/* 								{% endif %}*/
/* 							</div>*/
/* 						</div>*/
/* 					{% endfor %}*/
/* 				</form>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <div id="history-popup" class="white-popup mfp-hide panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title"><i class="fa fa-history"></i> {{ text_history }}</h3>*/
/* 	</div>*/
/* 	<div class="panel-body">*/
/* 		<table id="historytable" class="display" style="width:100%">*/
/* 			<thead>*/
/* 				<tr>*/
/* 					<th>{{entry_date}}</th>*/
/* 					<th>{{entry_user}}</th>*/
/* 					<th>{{entry_field}}</th>*/
/* 					<th>{{entry_oldval}}</th>*/
/* 					<th>{{entry_newval}}</th>*/
/* 				</tr>*/
/* 			</thead>*/
/* 		</table>*/
/* 	</div>*/
/* </div>*/
/* */
/* <script>*/
/* 	$(document).ready(function() {*/
/* 		$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });*/
/* 		*/
/* 		function autoresize(textarea) {*/
/* 			textarea.style.height = '0px';     //Reset height, so that it not only grows but also shrinks*/
/* 			var newheight = (textarea.scrollHeight+2);*/
/* 			if(newheight<36) {newheight=36;}*/
/* 			textarea.style.height = newheight + 'px';    //Set new height*/
/* 		}*/
/* 		*/
/* 		function formfuncs (){*/
/* 			$('textarea').each(function ()	{ autoresize(this);	});*/
/* 			$('textarea').keyup(function ()	{ autoresize(this);	});*/
/* 			$('textarea').keydown(function (e) {*/
/* 				<!-- Allow only alphanumeric -->*/
/* 				var k = e.which;*/
/* 				var ok =(( k >= 65 && k <=  90				) || // A-Z*/
/* 						 ( k >= 96 && k <= 105				) || // a-z*/
/* 						 ( k >= 35 && k <=  40				) || // arrows*/
/* 						 ( k ==  8 || k == 46				) || // Backspaces*/
/* 						 (!e.shiftKey && k >= 48 && k <= 57	) ); // 0-9*/
/* 				if(!ok){*/
/* 					e.preventDefault();*/
/* 				}*/
/* 			});*/
/* */
/* 			$(".datepicker").datepicker();*/
/* 			$(".masked").inputmask();*/
/* 			$('input, select, textarea').on('change', function() {*/
/* 				$(this).addClass('changed');*/
/* 			});*/
/* 			$('form').on('submit', function(e) {*/
/* 				$('select').prop('disabled',false);*/
/* 				{% if id is not null %}*/
/* 					$('input[type!="hidden"]:not([required]):not(.changed), textarea:not([required]):not(.changed), select:not([required]):not(.changed)').prop('disabled', true);*/
/* 				{% endif %}*/
/* 				var nchanged = ($('.changed').length == 0);*/
/* 				if(nchanged){*/
/* 					e.preventDefault();*/
/* 					$('input, textarea, select').prop('disabled', false);*/
/* 					$("#editopen").trigger( "click" );*/
/* 				}*/
/* 			});*/
/* 		*/
/* 		}*/
/* 		formfuncs();*/
/* */
/* 		$("#editlocked").click( function(){*/
/* 			$("#editlocked").hide();*/
/* 			$("#editopen").show();*/
/* 			$(".editactionbutton").show();*/
/* 			$('input, select, textarea').prop('readonly', false);*/
/* 			$('select').prop('disabled', false);*/
/* 		});*/
/* 		$("#editopen").click( function(){*/
/* 			$("#editlocked").show();*/
/* 			$("#editopen").hide();*/
/* 			$(".editactionbutton").hide();*/
/* 			$('input, textarea').prop('readonly', true);*/
/* 			$('select').prop('disabled', true);*/
/* 			$('form').each (function(){  */
/* 				this.reset();*/
/* 			}); */
/* 		});*/
/* 		{% if id is not null %}*/
/* 			$("#editopen").trigger( "click" );*/
/* 		{% else %}*/
/* 			$("#editlocked").trigger( "click" );*/
/* 			$("#buttons").hide();*/
/* 		{% endif %}*/
/* 		*/
/* 		$('#open_history-popup').magnificPopup({*/
/* 			type:'inline',*/
/* 			closeOnBgClick: false,*/
/* 			midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.*/
/* 			callbacks: {*/
/* 				open: function() {*/
/* 					console.log('Popup is opened');*/
/* 					$('#historytable').DataTable( {*/
/* 						processing: true,*/
/* 						serverSide: true,*/
/* 						fixedHeader: true,*/
/* 						destroy: true,*/
/* 						lengthMenu: [ [ 10, 50, 100, 200, 500,-1 ], [ 10, 50, 100, 200, 500, "ALL"] ],*/
/* 						ajax: "{{ ajax_route_history }}",*/
/* 					} );*/
/* 				},*/
/* 			},*/
/* 		});*/
/* 	} );*/
/* </script>*/
/* {{ footer }}*/
/* */
/* */
