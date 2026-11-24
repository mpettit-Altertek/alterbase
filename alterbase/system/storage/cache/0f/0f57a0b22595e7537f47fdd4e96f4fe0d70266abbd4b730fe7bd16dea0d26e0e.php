<?php

/* extension/MRP/productview_popups.twig */
class __TwigTemplate_dcb9457f5e272a536fc8e11cade8e6cb5dc9b92c69a9dd297e5862314269dff9 extends Twig_Template
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
<style>
\t.list-template{
\t\tdisplay:none;
\t}
</style>
<div id=\"duplicate-popup\" class=\"white-popup mfp-hide panel panel-default\">
\t<div class=\"panel-heading\">
\t\t<h3 class=\"panel-title\"><i class=\"fa ";
        // line 9
        echo (isset($context["button_duplicate_icon"]) ? $context["button_duplicate_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["button_duplicate"]) ? $context["button_duplicate"] : null);
        echo "<h3>
\t</div>
\t<div class=\"panel-body\">
\t\t<form action=\"";
        // line 12
        echo (isset($context["action_duplicate"]) ? $context["action_duplicate"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-duplicate\" class=\"form-horizontal\">
\t\t\t<input type=\"hidden\" name=\"id\"  value=\"";
        // line 13
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\"  />
\t\t\t<input type=\"hidden\" name=\"rev\" value=\"";
        // line 14
        echo (isset($context["rev"]) ? $context["rev"] : null);
        echo "\" />
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-newid\">&nbsp;</label>
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t<select name=\"newid\" id=\"input-newid\" class=\"form-control\" required>
\t\t\t\t\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["nextids"]) ? $context["nextids"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
            // line 20
            echo "\t\t\t\t\t\t\t<option value=\"";
            echo $this->getAttribute($context["op"], "val", array());
            echo "\">";
            echo $this->getAttribute($context["op"], "text", array());
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['op'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-newrev\">";
        // line 26
        echo (isset($context["entry_newrev"]) ? $context["entry_newrev"] : null);
        echo "</label>
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t<input type=\"text\" name=\"newrev\"  value=\"";
        // line 28
        echo (isset($context["rev"]) ? $context["rev"] : null);
        echo "\" id=\"input-newrev\"   class=\"form-control masked\" data-inputmask-regex=\"[A-Z0-9\\.]*\" required />
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-notes\">";
        // line 32
        echo (isset($context["entry_notes"]) ? $context["entry_notes"] : null);
        echo "</label>
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t<textarea name=\"notes\" id=\"input-notes\"   class=\"form-control\" required ></textarea>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"control-group\">
\t\t\t\t<input type=\"submit\" data-toggle=\"tooltip\" title=\"<i class='fa ";
        // line 38
        echo (isset($context["button_duplicate_icon"]) ? $context["button_duplicate_icon"] : null);
        echo "'></i>&nbsp;";
        echo (isset($context["button_duplicate"]) ? $context["button_duplicate"] : null);
        echo "\" class=\"btn btn-primary\"></input>
\t\t\t</div>
\t\t</form>
\t</div>
</div>
<div id=\"BOMedit-popup\" class=\"white-popup mfp-hide panel panel-default\">
\t<div class=\"panel-heading\">
\t\t<h3 class=\"panel-title\">";
        // line 45
        echo (isset($context["text_BOM"]) ? $context["text_BOM"] : null);
        echo "<h3>
\t</div>
\t<div class=\"panel-body\">
\t\t<form action=\"";
        // line 48
        echo (isset($context["action_bom"]) ? $context["action_bom"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-BOM\" class=\"form-horizontal\">
\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
        // line 49
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\" />
\t\t\t<input type=\"hidden\" name=\"rev\" value=\"";
        // line 50
        echo (isset($context["rev"]) ? $context["rev"] : null);
        echo "\" />
\t\t\t<div class=\"control-group\">
\t\t\t\t<div style=\"height: 36.4px;\">
\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t<input type=\"submit\" data-toggle=\"tooltip\" title=\"<i class='fa fa-save'></i>";
        // line 54
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"></input>
\t\t\t\t\t</div>
\t\t\t\t\t<br>
\t\t\t\t</div>
\t\t\t\t<div id=\"bomedit\" class=\"controls\">
\t\t\t\t\t<table>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Part Number</th>
\t\t\t\t\t\t\t<th>Part Revision</th>
\t\t\t\t\t\t\t";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["editbomcols"]) ? $context["editbomcols"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 64
            echo "\t\t\t\t\t\t\t\t<th>
\t\t\t\t\t\t\t\t\t";
            // line 65
            echo twig_replace_filter($this->getAttribute($context["col"], "name", array()), array("_" => " "));
            echo "
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range( -1, (twig_length_filter($this->env, (isset($context["rootbom"]) ? $context["rootbom"] : null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["ix"]) {
            // line 71
            echo "\t\t\t\t\t\t\t";
            $context["key"] = ((($context["ix"] ==  -1)) ? ("#") : ($context["ix"]));
            // line 72
            echo "\t\t\t\t\t\t\t<tr class=\"";
            echo ((($context["ix"] ==  -1)) ? ("list-template") : ("list-item"));
            echo "\">
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input name=\"rootbom[";
            // line 74
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][child_id]\" type=\"text\" placeholder=\"";
            echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
            echo "\" id=\"input-rootbom[";
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][child_id]\" value=\"";
            echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "child_id", array())) : (""));
            echo "\" class=\"form-control ";
            echo ((($context["ix"] ==  -1)) ? ("partnumber") : (""));
            echo "\" style=\"display:inline-block;    width: 160;\" ";
            echo ((($context["ix"] ==  -1)) ? (" ") : ("disabled"));
            echo ">
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<select name=\"rootbom[";
            // line 77
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][child_rev]\" id=\"input-rootbom[";
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][child_rev]\" class=\"form-control\" style=\"display:inline-block;    width: 160;\" ";
            echo ((($context["ix"] ==  -1)) ? (" ") : ("disabled"));
            echo ">
\t\t\t\t\t\t\t\t\t\t<option value=\"";
            // line 78
            echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "child_rev", array())) : (""));
            echo "\" selected >";
            echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "child_rev", array())) : (""));
            echo "</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["editbomcols"]) ? $context["editbomcols"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 82
                echo "\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t";
                // line 83
                if (($this->getAttribute($context["field"], "type", array()) == 1)) {
                    // line 84
                    echo "\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" placeholder=\"";
                    echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
                    echo "\" id=\"input-rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control fitY fitX\">";
                    echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "</textarea>
\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 85
$context["field"], "type", array()) == 2)) {
                    // line 86
                    echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control\" step=\"0.001\" value=\"";
                    echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 87
$context["field"], "type", array()) == 3)) {
                    // line 88
                    echo "\t\t\t\t\t\t\t\t\t\t\t<select  name=\"rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 89
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                    foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                        // line 90
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($context["k"] == $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array"))) {
                            // line 91
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["k"];
                            echo "\" selected >";
                            echo $context["v"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 93
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo $context["k"];
                            echo "\" >";
                            echo $context["v"];
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 95
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 96
                    echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 97
$context["field"], "type", array()) == 4)) {
                    // line 98
                    echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control datepicker\" value=\"";
                    echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute(                // line 99
$context["field"], "type", array()) == 5)) {
                    // line 100
                    echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "]\" id=\"input-rootbom[";
                    echo (isset($context["key"]) ? $context["key"] : null);
                    echo "][";
                    echo $this->getAttribute($context["field"], "name", array());
                    echo "\" class=\"form-control masked\" data-inputmask-regex=\"£[0-9]{1,}\\.[0-9]{2,}\" value=\"";
                    echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), $this->getAttribute($context["field"], "name", array()), array(), "array")) : (""));
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 102
                echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 104
            echo "\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"rootbom[";
            // line 105
            echo (isset($context["key"]) ? $context["key"] : null);
            echo "][remove]\" value=\"";
            echo (($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array")) ? ($this->getAttribute($this->getAttribute((isset($context["rootbom"]) ? $context["rootbom"] : null), (isset($context["key"]) ? $context["key"] : null), array(), "array"), "child_id", array())) : (""));
            echo "\">";
            echo (isset($context["entry_remove"]) ? $context["entry_remove"] : null);
            echo "<br>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ix'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "\t\t\t\t\t</table>
\t\t\t\t\t<a href=\"#\" class=\"list-add btn btn-primary\">";
        // line 110
        echo (isset($context["entry_add"]) ? $context["entry_add"] : null);
        echo "</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
</div>

<div id=\"history-popup\" class=\"white-popup mfp-hide panel panel-default\">
\t<div class=\"panel-heading\">
\t\t<h3 class=\"panel-title\"><i class=\"fa fa-history\"></i> ";
        // line 119
        echo (isset($context["text_history"]) ? $context["text_history"] : null);
        echo "</h3>
\t</div>
\t<div class=\"panel-body\">
\t\t<div class=\"form-horizontal\">
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-record_created\">";
        // line 124
        echo (isset($context["text_record_created"]) ? $context["text_record_created"] : null);
        echo "</label>
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t<input type=\"text\" id='input-record_created' value=\" ";
        // line 126
        echo (isset($context["record_created"]) ? $context["record_created"] : null);
        echo "\" class=\"form-control\" disabled />
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-record_created_by\">";
        // line 130
        echo (isset($context["text_record_created_by"]) ? $context["text_record_created_by"] : null);
        echo "</label>
\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t<input type=\"text\" id='input-record_created_by' value=\" ";
        // line 132
        echo (isset($context["record_created_by"]) ? $context["record_created_by"] : null);
        echo "\" class=\"form-control\" disabled />
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<table id=\"historytable\" class=\"display\" style=\"width:100%\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>";
        // line 139
        echo (isset($context["entry_date"]) ? $context["entry_date"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 140
        echo (isset($context["entry_user"]) ? $context["entry_user"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 141
        echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 142
        echo (isset($context["entry_oldval"]) ? $context["entry_oldval"] : null);
        echo "</th>
\t\t\t\t\t<th>";
        // line 143
        echo (isset($context["entry_newval"]) ? $context["entry_newval"] : null);
        echo "</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t</table>
\t</div>
</div>

<div id=\"dialog-confirm-loss\" class=\"modal\" tabindex=\"-1\" role=\"dialog\">
\t<div class=\"modal-dialog\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">Modal title</h5>
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
\t\t\t\t\t<span aria-hidden=\"true\">&times;</span>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<p>Modal body text goes here.</p>
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
\t\t\t\t<button type=\"button\" class=\"btn btn-primary\">Save changes</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>








";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productview_popups.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  410 => 143,  406 => 142,  402 => 141,  398 => 140,  394 => 139,  384 => 132,  379 => 130,  372 => 126,  367 => 124,  359 => 119,  347 => 110,  344 => 109,  330 => 105,  327 => 104,  320 => 102,  306 => 100,  304 => 99,  291 => 98,  289 => 97,  286 => 96,  280 => 95,  272 => 93,  264 => 91,  261 => 90,  257 => 89,  246 => 88,  244 => 87,  231 => 86,  229 => 85,  214 => 84,  212 => 83,  209 => 82,  205 => 81,  197 => 78,  189 => 77,  173 => 74,  167 => 72,  164 => 71,  160 => 70,  156 => 68,  147 => 65,  144 => 64,  140 => 63,  128 => 54,  121 => 50,  117 => 49,  113 => 48,  107 => 45,  95 => 38,  86 => 32,  79 => 28,  74 => 26,  68 => 22,  57 => 20,  53 => 19,  45 => 14,  41 => 13,  37 => 12,  29 => 9,  19 => 1,);
    }
}
/* */
/* <style>*/
/* 	.list-template{*/
/* 		display:none;*/
/* 	}*/
/* </style>*/
/* <div id="duplicate-popup" class="white-popup mfp-hide panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title"><i class="fa {{ button_duplicate_icon }}"></i>&nbsp;{{ button_duplicate }}<h3>*/
/* 	</div>*/
/* 	<div class="panel-body">*/
/* 		<form action="{{ action_duplicate }}" method="post" enctype="multipart/form-data" id="form-duplicate" class="form-horizontal">*/
/* 			<input type="hidden" name="id"  value="{{ id }}"  />*/
/* 			<input type="hidden" name="rev" value="{{ rev }}" />*/
/* 			<div class="form-group">*/
/* 				<label class="col-sm-2 control-label" for="input-newid">&nbsp;</label>*/
/* 				<div class="col-sm-10">*/
/* 					<select name="newid" id="input-newid" class="form-control" required>*/
/* 						{% for op in nextids %}*/
/* 							<option value="{{ op.val }}">{{ op.text }}</option>*/
/* 						{% endfor %}*/
/* 					</select>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group">*/
/* 				<label class="col-sm-2 control-label" for="input-newrev">{{ entry_newrev }}</label>*/
/* 				<div class="col-sm-10">*/
/* 					<input type="text" name="newrev"  value="{{ rev }}" id="input-newrev"   class="form-control masked" data-inputmask-regex="[A-Z0-9\.]*" required />*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group">*/
/* 				<label class="col-sm-2 control-label" for="input-notes">{{ entry_notes }}</label>*/
/* 				<div class="col-sm-10">*/
/* 					<textarea name="notes" id="input-notes"   class="form-control" required ></textarea>*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="control-group">*/
/* 				<input type="submit" data-toggle="tooltip" title="<i class='fa {{ button_duplicate_icon }}'></i>&nbsp;{{ button_duplicate }}" class="btn btn-primary"></input>*/
/* 			</div>*/
/* 		</form>*/
/* 	</div>*/
/* </div>*/
/* <div id="BOMedit-popup" class="white-popup mfp-hide panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title">{{ text_BOM }}<h3>*/
/* 	</div>*/
/* 	<div class="panel-body">*/
/* 		<form action="{{ action_bom }}" method="post" enctype="multipart/form-data" id="form-BOM" class="form-horizontal">*/
/* 			<input type="hidden" name="id" value="{{ id }}" />*/
/* 			<input type="hidden" name="rev" value="{{ rev }}" />*/
/* 			<div class="control-group">*/
/* 				<div style="height: 36.4px;">*/
/* 					<div class="pull-right">*/
/* 						<input type="submit" data-toggle="tooltip" title="<i class='fa fa-save'></i>{{ button_save }}" class="btn btn-primary"></input>*/
/* 					</div>*/
/* 					<br>*/
/* 				</div>*/
/* 				<div id="bomedit" class="controls">*/
/* 					<table>*/
/* 						<tr>*/
/* 							<th>Part Number</th>*/
/* 							<th>Part Revision</th>*/
/* 							{% for col in editbomcols %}*/
/* 								<th>*/
/* 									{{col.name|replace({'_': ' '})}}*/
/* 								</th>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 						*/
/* 						{% for ix in (-1)..((rootbom|length)-1) %}*/
/* 							{% set key = ((ix==(-1))?'#':ix) %}*/
/* 							<tr class="{{ (ix==(-1))?'list-template':'list-item'}}">*/
/* 								<td>*/
/* 									<input name="rootbom[{{ key }}][child_id]" type="text" placeholder="{{ entry_field }}" id="input-rootbom[{{ key }}][child_id]" value="{{ rootbom[key] ? rootbom[key].child_id }}" class="form-control {{ (ix == (-1))?'partnumber'}}" style="display:inline-block;    width: 160;" {{ (ix == (-1))?' ':'disabled' }}>*/
/* 								</td>*/
/* 								<td>*/
/* 									<select name="rootbom[{{ key }}][child_rev]" id="input-rootbom[{{ key }}][child_rev]" class="form-control" style="display:inline-block;    width: 160;" {{ (ix == (-1))?' ':'disabled' }}>*/
/* 										<option value="{{ rootbom[key] ? rootbom[key].child_rev }}" selected >{{ rootbom[key] ? rootbom[key].child_rev }}</option>*/
/* 									</select>*/
/* 								</td>*/
/* 								{% for field in editbomcols %}*/
/* 									<td>*/
/* 										{% if field.type == 1 %}*/
/* 											<textarea name="rootbom[{{ key }}][{{field.name}}]" placeholder="{{ entry_field }}" id="input-rootbom[{{ key }}][{{field.name}}" class="form-control fitY fitX">{{ rootbom[key] ? rootbom[key][field.name] }}</textarea>*/
/* 										{% elseif field.type == 2 %}*/
/* 											<input type="number" name="rootbom[{{ key }}][{{field.name}}]" id="input-rootbom[{{ key }}][{{field.name}}" class="form-control" step="0.001" value="{{ rootbom[key] ? rootbom[key][field.name] }}" />*/
/* 										{% elseif field.type == 3 %}*/
/* 											<select  name="rootbom[{{ key }}][{{field.name}}]" id="input-rootbom[{{ key }}][{{field.name}}" class="form-control">*/
/* 												{% for k,v in field.options %}*/
/* 													{% if k == field_data[field.name] %}*/
/* 														<option value="{{k}}" selected >{{v}}</option>*/
/* 													{% else %}*/
/* 														<option value="{{k}}" >{{v}}</option>*/
/* 													{% endif %}*/
/* 												{% endfor %}*/
/* 											</select>*/
/* 										{% elseif field.type == 4 %}*/
/* 											<input type="text" name="rootbom[{{ key }}][{{field.name}}]" id="input-rootbom[{{ key }}][{{field.name}}" class="form-control datepicker" value="{{ rootbom[key] ? rootbom[key][field.name] }}" />*/
/* 										{% elseif field.type == 5 %}*/
/* 											<input type="text" name="rootbom[{{ key }}][{{field.name}}]" id="input-rootbom[{{ key }}][{{field.name}}" class="form-control masked" data-inputmask-regex="£[0-9]{1,}\.[0-9]{2,}" value="{{ rootbom[key] ? rootbom[key][field.name] }}" />*/
/* 										{% endif %}*/
/* 									</td>*/
/* 								{% endfor %}*/
/* 								<td>*/
/* 									<input type="checkbox" name="rootbom[{{ key }}][remove]" value="{{ rootbom[key] ? rootbom[key].child_id }}">{{ entry_remove }}<br>*/
/* 								</td>*/
/* 							<tr>*/
/* 						{% endfor %}*/
/* 					</table>*/
/* 					<a href="#" class="list-add btn btn-primary">{{ entry_add }}</a>*/
/* 				</div>*/
/* 			</div>*/
/* 		</form>*/
/* 	</div>*/
/* </div>*/
/* */
/* <div id="history-popup" class="white-popup mfp-hide panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title"><i class="fa fa-history"></i> {{ text_history }}</h3>*/
/* 	</div>*/
/* 	<div class="panel-body">*/
/* 		<div class="form-horizontal">*/
/* 			<div class="form-group">*/
/* 				<label class="col-sm-2 control-label" for="input-record_created">{{ text_record_created }}</label>*/
/* 				<div class="col-sm-10">*/
/* 					<input type="text" id='input-record_created' value=" {{ record_created }}" class="form-control" disabled />*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="form-group">*/
/* 				<label class="col-sm-2 control-label" for="input-record_created_by">{{ text_record_created_by }}</label>*/
/* 				<div class="col-sm-10">*/
/* 					<input type="text" id='input-record_created_by' value=" {{ record_created_by }}" class="form-control" disabled />*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
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
/* <div id="dialog-confirm-loss" class="modal" tabindex="-1" role="dialog">*/
/* 	<div class="modal-dialog" role="document">*/
/* 		<div class="modal-content">*/
/* 			<div class="modal-header">*/
/* 				<h5 class="modal-title">Modal title</h5>*/
/* 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">*/
/* 					<span aria-hidden="true">&times;</span>*/
/* 				</button>*/
/* 			</div>*/
/* 			<div class="modal-body">*/
/* 				<p>Modal body text goes here.</p>*/
/* 			</div>*/
/* 			<div class="modal-footer">*/
/* 				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>*/
/* 				<button type="button" class="btn btn-primary">Save changes</button>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
