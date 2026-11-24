<?php

/* extension/MRP/productview_suppliers.twig */
class __TwigTemplate_45623db9b9b2d6fef379885b2b41b568e798bf380d433a4dbcf42a23dc8c2181 extends Twig_Template
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
\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_suppliers\">
\t\t<div class=\"panel-heading\">
\t\t\t<h3 class=\"panel-title\">
\t\t\t\t<i class=\"fa fa-store\"></i>&nbsp;";
        // line 6
        echo (isset($context["text_supplier"]) ? $context["text_supplier"] : null);
        echo "</h3>
\t\t\t</h3>
\t\t</div>
\t</a>
\t<div id=\"prod_suppliers\" class=\"panel-collapse collapse\">
\t\t<div class=\"panel-body\">
\t\t\t<style>
\t\t\t\t.ui-widget button{
\t\t\t\t\tfont-size: 13px;
\t\t\t\t}
\t\t\t\t#tbl_suppedit td,#tbl_suppedit th{
\t\t\t\t\tpadding: 1px 1px 1px 6px;
\t\t\t\t}
\t\t\t\t.list-template{
\t\t\t\t\tdisplay:none;
\t\t\t\t}
\t\t\t</style>
\t\t\t<form action=\"";
        // line 23
        echo (isset($context["action_suppliers"]) ? $context["action_suppliers"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-suppliers\" class=\"form-horizontal\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 24
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\"/>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"rev\" value=\"";
        // line 25
        echo (isset($context["rev"]) ? $context["rev"] : null);
        echo "\"/>
\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t
\t\t\t\t\t<div class=\"editactionbutton\">
\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t<input type=\"submit\" data-toggle=\"tooltip\" title=\"<i class='fa fa-save'></i>";
        // line 30
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"></input>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<br>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div id=\"suppedit\" class=\"dynamiclist\">
\t\t\t\t\t\t<table id=\"tbl_suppedit\">
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
        // line 38
        echo (isset($context["text_supplier"]) ? $context["text_supplier"] : null);
        echo "</th>
\t\t\t\t\t\t\t\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["suppfields"]) ? $context["suppfields"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 40
            echo "\t\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t\t";
            // line 41
            echo twig_replace_filter($this->getAttribute($context["col"], "name", array()), array("_" => " "));
            echo "
\t\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range( -1, (twig_length_filter($this->env, (isset($context["suppliers"]) ? $context["suppliers"] : null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["ix"]) {
            // line 46
            echo "\t\t\t\t\t\t\t\t";
            $context["key"] = ((($context["ix"] ==  -1)) ? ("#") : ($context["ix"]));
            // line 47
            echo "\t\t\t\t\t\t\t\t<tr class=\"";
            echo ((($context["ix"] ==  -1)) ? ("list-template") : ("list-item"));
            echo "\">
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<input name=\"suppliers[";
            // line 49
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][supplier_id]\" type=\"hidden\" value=\"";
            echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "supplier_id", array())) : (""));
            echo "\">
\t\t\t\t\t\t\t\t\t\t<input name=\"suppliers[";
            // line 50
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][supplier_name]\" type=\"text\" placeholder=\"";
            echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
            echo "\" id=\"input-suppliers[";
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][supplier_name]\" value=\"";
            echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "name", array())) : (""));
            echo "\" class=\"form-control supplier\" style=\"display:inline-block;    width: 160;\" forced_readonly=";
            echo ((($context["ix"] !=  -1)) ? ("True") : ("False"));
            echo ">
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["suppfields"]) ? $context["suppfields"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 53
                echo "\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 54
                if (($this->getAttribute($context["field"], "type", array()) == 1)) {
                    // line 55
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"suppliers[";
                    // line 56
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" placeholder=\"";
                    echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
                    echo "\" id=\"input-suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" class=\"form-control fitY fitX\" forced_readonly=";
                    echo (($this->getAttribute($context["field"], "readonly", array())) ? ("True") : ("False"));
                    echo ">";
                    echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-primary copytext\" type=\"button\"  for=\"input-suppliers[";
                    // line 59
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\">Copy</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 62
$context["field"], "type", array()) == 2)) {
                    // line 63
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" class=\"form-control\" value=\"";
                    echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" forced_readonly=";
                    echo (($this->getAttribute($context["field"], "readonly", array())) ? ("True") : ("False"));
                    echo "/>
\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 64
$context["field"], "type", array()) == 3)) {
                    // line 65
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<select  name=\"suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control\" forced_readonly=";
                    echo (($this->getAttribute($context["field"], "readonly", array())) ? ("True") : ("False"));
                    echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 66
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                    foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                        // line 67
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["k"] == $this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array"))) {
                            // line 68
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["k"];
                            echo "\" selected >";
                            echo $context["v"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 70
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["k"];
                            echo "\" >";
                            echo $context["v"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 72
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 73
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 74
$context["field"], "type", array()) == 4)) {
                    // line 75
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" class=\"form-control datepicker\" value=\"";
                    echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" forced_readonly=";
                    echo (($this->getAttribute($context["field"], "readonly", array())) ? ("True") : ("False"));
                    echo "/>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 77
$context["field"], "type", array()) == 5)) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-suppliers[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" class=\"form-control masked\" data-inputmask-regex=\"£[0-9]{1,}\\.[0-9]{2,}\" value=\"";
                    echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" forced_readonly=";
                    echo (($this->getAttribute($context["field"], "readonly", array())) ? ("True") : ("False"));
                    echo "/>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "\t\t\t\t\t\t\t\t\t<td class=\"editactionbutton\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"suppliers[";
            // line 83
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][remove]\" value=\"";
            echo (($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["suppliers"]) ? $context["suppliers"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "id", array())) : (""));
            echo "\">";
            echo (isset($context["entry_remove"]) ? $context["entry_remove"] : null);
            echo "<br>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ix'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "\t\t\t\t\t\t\t<tr class=\"editactionbutton\">
\t\t\t\t\t\t\t\t<td style=\"height:36px\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"list-add btn btn-primary\">";
        // line 89
        echo (isset($context["entry_add"]) ? $context["entry_add"] : null);
        echo "</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</form>
\t\t\t<script>
\t\t\t\t\$(function () {
\t\t\t\t\tfunction startsuppliersearch(){
\t\t\t\t\t\t\$(\".supplier\" ).autocomplete({
\t\t\t\t\t\t\tautoFocus: true,
\t\t\t\t\t\t\tsource: decodeURIComponent(\"";
        // line 101
        echo (isset($context["searchurlsupplier"]) ? $context["searchurlsupplier"] : null);
        echo "\"),
\t\t\t\t\t\t\tminLength: 2,
\t\t\t\t\t\t});
\t\t\t\t\t\t\$('input, select, textarea').on('change', function() {
\t\t\t\t\t\t\t\$(this).addClass('changed');
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t\tstartsuppliersearch();
\t\t\t\t\t\$(\".dynamiclist\").dynamiclist({
\t\t\t\t\t\taddCallbackFn: function(){
\t\t\t\t\t\t\tconsole.log('added line');
\t\t\t\t\t\t\tstartsuppliersearch();
\t\t\t\t\t\t\t
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t\t\$(\".copytext\").click(function(){
\t\t\t\t\t\tvar sel = \$.escapeSelector(\$( this ).attr(\"for\"));
\t\t\t\t\t\tconsole.log('#'+sel);
\t\t\t\t\t\t\$('#'+sel).select();
\t\t\t\t\t\tdocument.execCommand('copy');
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productview_suppliers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  307 => 101,  292 => 89,  288 => 87,  274 => 83,  271 => 82,  264 => 80,  248 => 78,  246 => 77,  230 => 75,  228 => 74,  225 => 73,  219 => 72,  211 => 70,  203 => 68,  200 => 67,  196 => 66,  185 => 65,  183 => 64,  168 => 63,  166 => 62,  158 => 59,  140 => 56,  137 => 55,  135 => 54,  132 => 53,  128 => 52,  115 => 50,  109 => 49,  103 => 47,  100 => 46,  96 => 45,  93 => 44,  84 => 41,  81 => 40,  77 => 39,  73 => 38,  62 => 30,  54 => 25,  50 => 24,  46 => 23,  26 => 6,  19 => 1,);
    }
}
/* */
/* <div class="panel panel-default">*/
/* 	<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_suppliers">*/
/* 		<div class="panel-heading">*/
/* 			<h3 class="panel-title">*/
/* 				<i class="fa fa-store"></i>&nbsp;{{ text_supplier }}</h3>*/
/* 			</h3>*/
/* 		</div>*/
/* 	</a>*/
/* 	<div id="prod_suppliers" class="panel-collapse collapse">*/
/* 		<div class="panel-body">*/
/* 			<style>*/
/* 				.ui-widget button{*/
/* 					font-size: 13px;*/
/* 				}*/
/* 				#tbl_suppedit td,#tbl_suppedit th{*/
/* 					padding: 1px 1px 1px 6px;*/
/* 				}*/
/* 				.list-template{*/
/* 					display:none;*/
/* 				}*/
/* 			</style>*/
/* 			<form action="{{action_suppliers}}" method="post" enctype="multipart/form-data" id="form-suppliers" class="form-horizontal">*/
/* 							<input type="hidden" name="id" value="{{ id }}"/>*/
/* 							<input type="hidden" name="rev" value="{{ rev }}"/>*/
/* 				<div class="control-group">*/
/* 					*/
/* 					<div class="editactionbutton">*/
/* 						<div class="pull-right">*/
/* 							<input type="submit" data-toggle="tooltip" title="<i class='fa fa-save'></i>{{ button_save }}" class="btn btn-primary"></input>*/
/* 						</div>*/
/* 						<br>*/
/* 					</div>*/
/* 					*/
/* 					<div id="suppedit" class="dynamiclist">*/
/* 						<table id="tbl_suppedit">*/
/* 							<tr>*/
/* 								<th>{{text_supplier}}</th>*/
/* 								{% for col in suppfields %}*/
/* 									<th>*/
/* 										{{col.name|replace({'_': ' '})}}*/
/* 									</th>*/
/* 								{% endfor %}*/
/* 							</tr>*/
/* 							{% for ix in (-1)..((suppliers|length)-1) %}*/
/* 								{% set key = ((ix==(-1))?'#':ix) %}*/
/* 								<tr class="{{ (ix==(-1))?'list-template':'list-item'}}">*/
/* 									<td>*/
/* 										<input name="suppliers[{{ key }}][supplier_id]" type="hidden" value="{{ suppliers[key] ? suppliers[key].supplier_id }}">*/
/* 										<input name="suppliers[{{ key }}][supplier_name]" type="text" placeholder="{{ entry_field }}" id="input-suppliers[{{ key }}][supplier_name]" value="{{ suppliers[key] ? suppliers[key].name }}" class="form-control supplier" style="display:inline-block;    width: 160;" forced_readonly={{ (ix!=(-1))?'True':'False' }}>*/
/* 									</td>*/
/* 									{% for field in suppfields %}*/
/* 										<td>*/
/* 											{% if field.type == 1 %}*/
/* 												<div class="input-group">*/
/* 													<textarea name="suppliers[{{ key }}][{{field.name}}]" placeholder="{{ entry_field }}" id="input-suppliers[{{ key }}][{{field.name}}]" class="form-control fitY fitX" forced_readonly={{field.readonly?'True':'False'}}>{{ suppliers[key] ? suppliers[key][field.name] }}</textarea>*/
/* 													*/
/* 													<span class="input-group-btn">*/
/* 														<button class="btn btn-primary copytext" type="button"  for="input-suppliers[{{ key }}][{{field.name}}]">Copy</button>*/
/* 													</span>*/
/* 												</div>*/
/* 											{% elseif field.type == 2 %}*/
/* 												<input type="number" name="suppliers[{{ key }}][{{field.name}}]" id="input-suppliers[{{ key }}][{{field.name}}]" class="form-control" value="{{ suppliers[key] ? suppliers[key][field.name] }}" forced_readonly={{field.readonly?'True':'False'}}/>*/
/* 											{% elseif field.type == 3 %}*/
/* 												<select  name="suppliers[{{ key }}][{{field.name}}]" id="input-{{ field.name }}" class="form-control" forced_readonly={{field.readonly?'True':'False'}}>*/
/* 													{% for k,v in field.options %}*/
/* 														{% if k == suppliers[key][field.name] %}*/
/* 															<option value="{{k}}" selected >{{v}}</option>*/
/* 														{% else %}*/
/* 															<option value="{{k}}" >{{v}}</option>*/
/* 														{% endif %}*/
/* 													{% endfor %}*/
/* 												</select>*/
/* 											{% elseif field.type == 4 %}*/
/* 												<input type="text" name="suppliers[{{ key }}][{{field.name}}]" id="input-suppliers[{{ key }}][{{field.name}}]" class="form-control datepicker" value="{{ suppliers[key] ? suppliers[key][field.name] }}" forced_readonly={{field.readonly?'True':'False'}}/>*/
/* 											*/
/* 											{% elseif field.type == 5 %}*/
/* 												<input type="text" name="suppliers[{{ key }}][{{field.name}}]" id="input-suppliers[{{ key }}][{{field.name}}]" class="form-control masked" data-inputmask-regex="£[0-9]{1,}\.[0-9]{2,}" value="{{ suppliers[key] ? suppliers[key][field.name] }}" forced_readonly={{field.readonly?'True':'False'}}/>*/
/* 											{% endif %}*/
/* 										</td>*/
/* 									{% endfor %}*/
/* 									<td class="editactionbutton">*/
/* 										<input type="checkbox" name="suppliers[{{ key }}][remove]" value="{{ suppliers[key] ? suppliers[key].id }}">{{ entry_remove }}<br>*/
/* 									</td>*/
/* 								<tr>*/
/* 							{% endfor %}*/
/* 							<tr class="editactionbutton">*/
/* 								<td style="height:36px">*/
/* 									<a href="#" class="list-add btn btn-primary">{{ entry_add }}</a>*/
/* 								</td>*/
/* 							</tr>*/
/* 						</table>*/
/* 					</div>*/
/* 				</div>*/
/* 			</form>*/
/* 			<script>*/
/* 				$(function () {*/
/* 					function startsuppliersearch(){*/
/* 						$(".supplier" ).autocomplete({*/
/* 							autoFocus: true,*/
/* 							source: decodeURIComponent("{{searchurlsupplier}}"),*/
/* 							minLength: 2,*/
/* 						});*/
/* 						$('input, select, textarea').on('change', function() {*/
/* 							$(this).addClass('changed');*/
/* 						});*/
/* 					}*/
/* 					startsuppliersearch();*/
/* 					$(".dynamiclist").dynamiclist({*/
/* 						addCallbackFn: function(){*/
/* 							console.log('added line');*/
/* 							startsuppliersearch();*/
/* 							*/
/* 						}*/
/* 					});*/
/* 					$(".copytext").click(function(){*/
/* 						var sel = $.escapeSelector($( this ).attr("for"));*/
/* 						console.log('#'+sel);*/
/* 						$('#'+sel).select();*/
/* 						document.execCommand('copy');*/
/* 					});*/
/* 				});*/
/* 			</script>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* */
