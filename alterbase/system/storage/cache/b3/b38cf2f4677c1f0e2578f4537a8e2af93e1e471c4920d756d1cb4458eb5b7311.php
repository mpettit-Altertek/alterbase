<?php

/* extension/MRP/productview.twig */
class __TwigTemplate_85ae6f6877e9144b76067ba5be6264e13c19de5418e6adadbcdccba696be002b extends Twig_Template
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
\t\t.ui-autocomplete-loading {
\t\t\tbackground: white url(\"view/image/ui-anim_basic_16x16.gif\") right center no-repeat;
\t\t}
\t\t.ui-autocomplete{
\t\t\tz-index:10000;
\t\t}
\t\t.white-popup {
\t\t\tposition: relative;
\t\t\tbackground: #FFF;
\t\t\twidth: auto;
\t\t\tmax-width: 80%;
\t\t\tmargin: 20px auto;
\t\t}
\t\t.white-popup .panel-heading {
\t\t\tcolor: #000000;
\t\t\tborder-color: #dcdcdc;
\t\t\tbackground: #bfbfbf;
\t\t\ttext-shadow: 0 -1px 0 rgba(50,50,50,0);
\t\t}
\t\t.editactionbutton{
\t\t\tdisplay:none;
\t\t\theight: 36.4px;
\t\t}
\t\ttextarea {
\t\t\twhite-space: pre;
\t\t\toverflow: hidden;
\t\t\tresize: none;
\t\t}
\t\t.pull-right {
\t\t\tpadding-bottom: 10px;
\t\t}
\t\t#buttons{
\t\t\tdisplay: inline-block;
\t\t}
\t\t.ui-widget-overlay{
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\twidth: 100%;
\t\t\theight: 100%;
\t\t\tz-index: 1042;
\t\t\toverflow: hidden;
\t\t\tposition: fixed;
\t\t\tbackground: #0b0b0b;
\t\t\topacity: 0.8;
\t\t}
\t\t.panel {
\t\t\tmargin-bottom:unset;
\t\t}
\t\t
\t\ta.collapsed .panel-title::before
\t\t{
\t\t\tfont: normal normal normal 14px/1 FontAwesome;
\t\t\tcontent: \"\\f138\";
\t\t\tpadding-right: 15px;
\t\t}
\t\ta .panel-title::before
\t\t{
\t\t\tfont: normal normal normal 14px/1 FontAwesome;
\t\t\tcontent: \"\\f13a\";
\t\t\tpadding-right: 15px;
\t\t}
\t\t
\t\t#BOMtree > thead > tr > th {
\t\t\tmargin: 0;
\t\t\tpadding: 2px;
\t\t}
\t\t#BOMtree > tbody > tr > td:nth-child(1) {
\t\t\twhite-space: nowrap;
\t\t\twidth: 1px;
\t\t}
\t\t#BOMtree > tbody > tr > td:nth-child(2),
\t\t#BOMtree > thead > tr > th:nth-child(2) {
\t\t\twidth:35px;
\t\t\ttext-align: center;
\t\t}
\t\t#BOMtree > tbody > tr > td:nth-child(3),
\t\t#BOMtree > thead > tr > th:nth-child(3) {
\t\t\twidth:50px;
\t\t\ttext-align: center;
\t\t}

\t</style>
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<div id=\"buttons\">
\t\t\t\t\t<a href=\"#duplicate-popup\"\t\t\t\t\t\t\tdata-toggle=\"tooltip\" title=\"";
        // line 91
        echo (isset($context["button_duplicate"]) ? $context["button_duplicate"] : null);
        echo "\"\tclass=\"btn btn-primary open-popup-link editactionbutton\"><i class=\"fa ";
        echo (isset($context["button_duplicate_icon"]) ? $context["button_duplicate_icon"] : null);
        echo "\"></i></a>
\t\t\t\t\t<button type=\"button\"\t\tid=\"editlocked\"\t\t\tdata-toggle=\"tooltip\" title=\"";
        // line 92
        echo (isset($context["button_enable_edit"]) ? $context["button_enable_edit"] : null);
        echo "\"\tclass=\"btn btn-primary\"\t\t\t\t\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_enable_edit_icon"]) ? $context["button_enable_edit_icon"] : null);
        echo "\"></i></button>
\t\t\t\t\t<button type=\"button\"\t\tid=\"editopen\"\t\t\tdata-toggle=\"tooltip\" title=\"";
        // line 93
        echo (isset($context["button_disable_edit"]) ? $context["button_disable_edit"] : null);
        echo "\"\tclass=\"btn btn-primary\"\t\t\t\t\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_disable_edit_icon"]) ? $context["button_disable_edit_icon"] : null);
        echo "\"></i></button>
\t\t\t\t\t<a href=\"#history-popup\"\tid=\"open_history-popup\"\tdata-toggle=\"tooltip\" title=\"";
        // line 94
        echo (isset($context["button_history"]) ? $context["button_history"] : null);
        echo "\"\t\tclass=\"btn btn-primary\"\t\t\t\t\t\t\t\t\t><i class=\"fa ";
        echo (isset($context["button_history_icon"]) ? $context["button_history_icon"] : null);
        echo "\"></i></a>
\t\t\t\t</div>
\t\t\t\t<a href=\"";
        // line 96
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\"\t\t\t\t\t\t\t\tdata-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\"\t\tclass=\"btn btn-default\"\t\t\t\t\t\t\t\t\t><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1><i class=\"fa ";
        // line 98
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h1><br>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 101
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
        // line 103
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 107
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 108
            echo "\t\t\t<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error"]) ? $context["error"] : null);
            echo "
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
\t\t\t</div>\t
\t\t";
        }
        // line 112
        echo "\t\t<div class=\"panel panel-default\" id=\"prodaccordion\">
\t\t\t<div class=\"panel panel-default\">
\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_details\">
\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t<h3 class=\"panel-title\">
\t\t\t\t\t\t\t";
        // line 117
        echo (isset($context["text_view_details"]) ? $context["text_view_details"] : null);
        echo "
\t\t\t\t\t\t</h3>
\t\t\t\t\t</div>
\t\t\t\t</a>
\t\t\t\t<div id=\"prod_details\" class=\"panel-collapse collapse\">
\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t<form action=\"";
        // line 123
        echo (isset($context["action_part"]) ? $context["action_part"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-record\" class=\"form-horizontal\">
\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"editactionbutton\">
\t\t\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t\t\t<input type=\"submit\" data-toggle=\"tooltip\" title=\"<i class='fa fa-save'></i>";
        // line 127
        echo (isset($context["button_save"]) ? $context["button_save"] : null);
        echo "\" class=\"btn btn-primary\"></input>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-id\">";
        // line 132
        echo (isset($context["entry_partno"]) ? $context["entry_partno"] : null);
        echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9 input-group\">
\t\t\t\t\t\t\t\t\t";
        // line 134
        if ((null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 135
            echo "\t\t\t\t\t\t\t\t\t\t<select name=\"id\" id=\"input-id\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 136
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["nextids"]) ? $context["nextids"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
                // line 137
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo $this->getAttribute($context["op"], "val", array());
                echo "\">";
                echo $this->getAttribute($context["op"], "text", array());
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['op'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 139
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"rev\" value=\"A\" id=\"input-rev\"/>
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 142
            echo "\t\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\" ";
            echo (isset($context["dispidrev"]) ? $context["dispidrev"] : null);
            echo "\" class=\"form-control\" disabled />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id\" value=\"";
            // line 143
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "\" id=\"input-id\"/>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"rev\" value=\"";
            // line 144
            echo (isset($context["rev"]) ? $context["rev"] : null);
            echo "\" id=\"input-rev\"/>
\t\t\t\t\t\t\t\t\t";
        }
        // line 146
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 149
        echo (isset($context["entry_name"]) ? $context["entry_name"] : null);
        echo "</label>
\t\t\t\t\t\t\t\t<div class=\"col-sm-9 input-group\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fields[name]\"value=\"";
        // line 151
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "\" id=\"input-name\" class=\"form-control\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        // line 155
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) ? $context["fields"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 156
            echo "\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-";
            // line 157
            echo $this->getAttribute($context["field"], "name", array());
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 158
            if ((twig_length_filter($this->env, $this->getAttribute($context["field"], "tooltip", array())) > 1)) {
                // line 159
                echo "\t\t\t\t\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"\" data-original-title=\"";
                echo $this->getAttribute($context["field"], "tooltip", array());
                echo "\">
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 161
            echo "\t\t\t\t\t\t\t\t\t\t";
            echo twig_replace_filter($this->getAttribute($context["field"], "name", array()), array("_" => " "));
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 162
            if ((twig_length_filter($this->env, $this->getAttribute($context["field"], "tooltip", array())) > 1)) {
                // line 163
                echo "\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 165
            echo "\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-9 input-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 167
            if (($this->getAttribute($context["field"], "type", array()) == 1)) {
                // line 168
                echo "\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" placeholder=\"";
                echo (isset($context["entry_field"]) ? $context["entry_field"] : null);
                echo "\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control fitY\">";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "</textarea>
\t\t\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 169
$context["field"], "type", array()) == 2)) {
                // line 170
                echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\" step=\"0.001\" />
\t\t\t\t\t\t\t\t\t\t\t<span class=\"input-group-addon\">";
                // line 171
                echo $this->getAttribute($this->getAttribute($context["field"], "options", array()), 0, array(), "array");
                echo "</span>

\t\t\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 173
$context["field"], "type", array()) == 3)) {
                // line 174
                echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<select  name=\"fields[";
                // line 175
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 176
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["field"], "options", array()));
                foreach ($context['_seq'] as $context["k"] => $context["v"]) {
                    // line 177
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($context["k"] == $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array"))) {
                        // line 178
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $context["k"];
                        echo "\" selected >";
                        echo $context["v"];
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 180
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo $context["k"];
                        echo "\" >";
                        echo $context["v"];
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 182
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 183
                echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 184
$context["field"], "type", array()) == 4)) {
                // line 185
                echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control datepicker\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\" />
\t\t\t\t\t\t\t\t\t\t";
            } elseif (($this->getAttribute(            // line 186
$context["field"], "type", array()) == 5)) {
                // line 187
                echo "\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"fields[";
                echo $this->getAttribute($context["field"], "name", array());
                echo "]\" id=\"input-";
                echo $this->getAttribute($context["field"], "name", array());
                echo "\" class=\"form-control masked\" data-inputmask-regex=\"£[0-9]{1,}\\.[0-9]{2,}\" value=\"";
                echo $this->getAttribute((isset($context["field_data"]) ? $context["field_data"] : null), $this->getAttribute($context["field"], "name", array()), array(), "array");
                echo "\"  />
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 189
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 197
        if ( !(null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 198
            echo "\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_BOM\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<h3 class=\"panel-title\">
\t\t\t\t\t\t\t\t<i class=\"fas fa-stream\"></i>&nbsp;";
            // line 202
            echo (isset($context["text_BOM"]) ? $context["text_BOM"] : null);
            echo "
\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>
\t\t\t\t\t<div id=\"prod_BOM\" class=\"panel-collapse collapse\">
\t\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t\t<div class=\"pull-right\">
\t\t\t\t\t\t\t\t<a href=\"#BOMedit-popup\" data-toggle=\"tooltip\" title=\"";
            // line 209
            echo (isset($context["button_edit"]) ? $context["button_edit"] : null);
            echo "\" class=\"btn btn-primary open-popup-link editactionbutton\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<table id=\"BOMtree\" class=\"treetable\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>Part Number</th>
\t\t\t\t\t\t\t\t\t\t";
            // line 216
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bomcols"]) ? $context["bomcols"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                // line 217
                echo "\t\t\t\t\t\t\t\t\t\t\t<th>";
                echo twig_replace_filter($this->getAttribute($context["col"], "name", array()), array("_" => " "));
                echo "</th>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 219
            echo "\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
            // line 222
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fullbom"]) ? $context["fullbom"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 223
                echo "\t\t\t\t\t\t\t\t\t\t<tr data-tt-id=\"";
                echo $this->getAttribute($context["item"], "id", array());
                echo "\" data-tt-parent-id=\"";
                echo $this->getAttribute($context["item"], "parid", array());
                echo "\" class=\"";
                echo $this->getAttribute($context["item"], "cls", array());
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<img  src=\"";
                // line 225
                echo $this->getAttribute($context["item"], "icon", array());
                echo "\" />&nbsp;";
                echo $this->getAttribute($context["item"], "partno", array());
                echo "
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 227
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["bomcols"]) ? $context["bomcols"] : null));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                    // line 228
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 229
                    echo twig_include($this->env, $context, twig_template_from_string($this->env, (("{{item.data." . $this->getAttribute($context["col"], "datapath", array())) . "}}")));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 232
                echo "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 234
            echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_usedon\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<h3 class=\"panel-title\">
\t\t\t\t\t\t\t\t<i class=\"fas fa-stream\"></i>&nbsp;";
            // line 243
            echo (isset($context["text_usedon"]) ? $context["text_usedon"] : null);
            echo "
\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>
\t\t\t\t\t<div id=\"prod_usedon\" class=\"panel-collapse collapse\">
\t\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t\t<table id=\"usedon\" class=\"table table-bordered\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t";
            // line 252
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["usedoncols"]) ? $context["usedoncols"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                // line 253
                echo "\t\t\t\t\t\t\t\t\t\t\t<th>";
                echo twig_replace_filter($this->getAttribute($context["col"], "name", array()), array("_" => " "));
                echo "</th>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 255
            echo "\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
            // line 258
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["usedon"]) ? $context["usedon"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 259
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 260
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["usedoncols"]) ? $context["usedoncols"] : null));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                    // line 261
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 262
                    echo twig_include($this->env, $context, twig_template_from_string($this->env, (("{{item." . $this->getAttribute($context["col"], "datapath", array())) . "}}")));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 265
                echo "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 267
            echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<a data-toggle=\"collapse\" data-parent=\"#prodaccordion\" href=\"#prod_stat\">
\t\t\t\t\t\t<div class=\"panel-heading\">
\t\t\t\t\t\t\t<h3 class=\"panel-title\">
\t\t\t\t\t\t\t\t<i class=\"fas fa-table\"></i>&nbsp;";
            // line 276
            echo (isset($context["text_statistics"]) ? $context["text_statistics"] : null);
            echo "
\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t</a>
\t\t\t\t\t<div id=\"prod_stat\" class=\"panel-collapse collapse\">
\t\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t\t<div class=\"accordion\" id=\"stataccordion\">
\t\t\t\t\t\t\t\t";
            // line 283
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["statmodules"]) ? $context["statmodules"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
                // line 284
                echo "\t\t\t\t\t\t\t\t\t";
                echo $context["mod"];
                echo "
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 286
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
            // line 290
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
                // line 291
                echo "\t\t\t\t\t";
                echo $context["mod"];
                echo "
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 293
            echo "\t\t\t\t
\t\t\t";
        }
        // line 295
        echo "\t\t</div>
\t</div>
</div>
";
        // line 298
        echo (isset($context["popups"]) ? $context["popups"] : null);
        echo "
<script>
\t\$(function () {
\t\t
\t\tfunction autoresizeY(textarea) {
\t\t\ttextarea.style.height = '0px';     //Reset height, so that it not only grows but also shrinks
\t\t\tvar newheight = (textarea.scrollHeight+2);
\t\t\tif(newheight<36) {newheight=36;}
\t\t\ttextarea.style.height = newheight + 'px';    //Set new height
\t\t}
\t\tfunction autoresizeX(textarea) {
\t\t\ttextarea.style.width = '0px';
\t\t\tvar newwidth = (textarea.scrollWidth+25);
\t\t\tif(newwidth<148.4) {newwidth=148.4;}
\t\t\ttextarea.style.width = newwidth + 'px';
\t\t}
\t\tfunction formfuncs (){
\t\t\t\$('.fitY').each(function ()\t\t{ autoresizeY(this);\t});
\t\t\t\$('.fitY').keyup(function ()\t{ autoresizeY(this);\t});
\t\t\t\$('.fitX').each(function ()\t\t{ autoresizeX(this);\t});
\t\t\t\$('.fitX').keyup(function ()\t{ autoresizeX(this);\t});
\t\t\t
\t\t\t\$('input, select, textarea').on('change', function() {
\t\t\t\t\$(this).addClass('changed');
\t\t\t});
\t\t\t\$('#bomedit input, #bomedit select, #bomedit textarea').on('change',function() {
\t\t\t\t\$('#'+\$.escapeSelector(this.parentElement.parentElement.children[0].children[0].id)).addClass('changed');
\t\t\t\t\$('#'+\$.escapeSelector(this.parentElement.parentElement.children[1].children[0].id)).addClass('changed');
\t\t\t});
\t\t\t
\t\t\t\$('form input').keydown(function (e) {
\t\t\t\tif (e.keyCode == 13) {
\t\t\t\t\te.preventDefault();
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t});
\t\t\t\$('form').on('submit', function(e) {
\t\t\t\t\$('input, textarea, select').prop('disabled', false);
\t\t\t\t";
        // line 336
        if ( !(null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 337
            echo "\t\t\t\t\t\$(\t'input[type!=\"hidden\"]:not([required]):not(.changed)').prop('disabled', true);
\t\t\t\t\t\$(\t'textarea:not([required]):not(.changed)').prop('disabled', true);
\t\t\t\t\t\$(\t'select:not([required]):not(.changed)').prop('disabled', true);
\t\t\t\t";
        }
        // line 341
        echo "
\t\t\t\tvar nchanged = (\$('.changed').length == 0);
\t\t\t\tif(nchanged){
\t\t\t\t\te.preventDefault();
\t\t\t\t\t\$.magnificPopup.close();
\t\t\t\t\t\$('input, textarea, select').prop('disabled', false);
\t\t\t\t\t\$(\"#editopen\").trigger( \"click\" );
\t\t\t\t}
\t\t\t});
\t\t\t\$(\".datepicker\").datepicker();
\t\t\t
\t\t\t\$(\".masked\").inputmask();
\t\t\t\$(\".partnumber\" ).autocomplete({
\t\t\t\tsource: decodeURIComponent(\"";
        // line 354
        echo (isset($context["searchproducturl"]) ? $context["searchproducturl"] : null);
        echo "\"),
\t\t\t\tminLength: 2,
\t\t\t\tautoFocus: true,
\t\t\t\tselect: function(event,ui){
\t\t\t\t\tconsole.log(ui);
\t\t\t\t\tvar id = event.target.id;
\t\t\t\t\tvar ix = /\\[([0-9]*)\\]/gm.exec(id)[1];
\t\t\t\t\tvar rev = \$(\"#\"+\$.escapeSelector(\"input-rootbom[\"+ix+\"][child_rev]\"));
\t\t\t\t\trev.empty();
\t\t\t\t\trev.append(\$('<option>', {
\t\t\t\t\t\t\tvalue: '+',
\t\t\t\t\t\t\ttext: '+ : Latest'
\t\t\t\t\t\t}));
\t\t\t\t\t\$.each(ui.item.revs,function(k,v){
\t\t\t\t\t\trev.append(\$('<option>', {
\t\t\t\t\t\t\tvalue: v,
\t\t\t\t\t\t\ttext: v
\t\t\t\t\t\t}));
\t\t\t\t\t});
\t\t\t\t}
\t\t\t});
\t\t}
\t\tformfuncs();
\t\t
\t\t\$(\"#bomedit\").dynamiclist({
\t\t\tmaxSize: 300,
\t\t\taddCallbackFn: function(item){
\t\t\t\tconsole.log('added line');
\t\t\t\t
\t\t\t\titem.find('input[type!=\"hidden\"][type!=\"checkbox\"], textarea, select').prop('required', true);
\t\t\t\tformfuncs();
\t\t\t},
\t\t});

\t\t\$(\"#editlocked\").click( function(){
\t\t\t";
        // line 389
        if ((isset($context["RW_permission"]) ? $context["RW_permission"] : null)) {
            // line 390
            echo "\t\t\t\tBootstrapDialog.show({
\t\t\t\t\ttitle: '";
            // line 391
            echo (isset($context["confirm_edit_title"]) ? $context["confirm_edit_title"] : null);
            echo "',
\t\t\t\t\tmessage: '";
            // line 392
            echo (isset($context["confirm_edit"]) ? $context["confirm_edit"] : null);
            echo "',
\t\t\t\t\tbuttons: [{
\t\t\t\t\t\tlabel: '";
            // line 394
            echo $this->getAttribute((isset($context["confirm_edit_options"]) ? $context["confirm_edit_options"] : null), "edit", array());
            echo "',
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\t\$(\"#editlocked\").hide();
\t\t\t\t\t\t\t\$(\"#editopen\").show();
\t\t\t\t\t\t\t\$(\".editactionbutton\").show();
\t\t\t\t\t\t\t\$('input, select, textarea').not( \"[forced_readonly='True']\" ).prop('readonly', false);
\t\t\t\t\t\t\t\$('select').not( \"[forced_readonly='True']\" ).prop('disabled', false);
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}, {
\t\t\t\t\t\tlabel: \"";
            // line 404
            echo $this->getAttribute((isset($context["confirm_edit_options"]) ? $context["confirm_edit_options"] : null), "duplicate", array());
            echo "\",
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\t\$.magnificPopup.open({
\t\t\t\t\t\t\t\titems:{
\t\t\t\t\t\t\t\t\ttype:'inline',
\t\t\t\t\t\t\t\t\tsrc: \"#duplicate-popup\",
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\tcloseOnBgClick: false,
\t\t\t\t\t\t\t\tcallbacks: {
\t\t\t\t\t\t\t\t\topen: function() {
\t\t\t\t\t\t\t\t\t\tconsole.log('Popup is opened');
\t\t\t\t\t\t\t\t\t\tformfuncs();
\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\tclose: function() {
\t\t\t\t\t\t\t\t\t\tconsole.log('Popup is closed');
\t\t\t\t\t\t\t\t\t\tformfuncs();
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\$('input, select, textarea').prop('readonly', false);
\t\t\t\t\t\t\t\$('select').prop('disabled', false);
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}, {
\t\t\t\t\t\tlabel: \"Cancel\",
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}]
\t\t\t\t});
\t\t\t";
        } else {
            // line 435
            echo "\t\t\t\tBootstrapDialog.show({
\t\t\t\t\ttitle: '";
            // line 436
            echo (isset($context["no_edit_title"]) ? $context["no_edit_title"] : null);
            echo "',
\t\t\t\t\tmessage: '";
            // line 437
            echo (isset($context["no_edit"]) ? $context["no_edit"] : null);
            echo "',
\t\t\t\t\tbuttons: [{
\t\t\t\t\t\tlabel: \"Cancel\",
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}]
\t\t\t\t});
\t\t\t";
        }
        // line 446
        echo "\t\t});
\t\t\$(\"#editopen\").click( function(){
\t\t
\t\t\tif (\$(\".changed\").length ) {
\t\t\t
\t\t\t\tBootstrapDialog.show({
\t\t\t\t\ttitle: '";
        // line 452
        echo (isset($context["confirm_loss_title"]) ? $context["confirm_loss_title"] : null);
        echo "',
\t\t\t\t\tmessage: '";
        // line 453
        echo (isset($context["confirm_loss"]) ? $context["confirm_loss"] : null);
        echo "',
\t\t\t\t\tbuttons: [{
\t\t\t\t\t\tlabel: '";
        // line 455
        echo $this->getAttribute((isset($context["confirm_loss_options"]) ? $context["confirm_loss_options"] : null), "clear", array());
        echo "',
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\t\$(\"#editlocked\").show();
\t\t\t\t\t\t\t\$(\"#editopen\").hide();
\t\t\t\t\t\t\t\$(\".editactionbutton\").hide();
\t\t\t\t\t\t\t\$('input, textarea').prop('readonly', true);
\t\t\t\t\t\t\t\$('select').prop('disabled', true);
\t\t\t\t\t\t\t\$('form').each (function(){  
\t\t\t\t\t\t\t\tthis.reset();
\t\t\t\t\t\t\t}); 
\t\t\t\t\t\t\t\$('input, select, textarea').removeClass('changed');
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}, {
\t\t\t\t\t\tlabel: \"Cancel\",
\t\t\t\t\t\taction: function(dialog) {
\t\t\t\t\t\t\tdialog.close();
\t\t\t\t\t\t}
\t\t\t\t\t}]
\t\t\t\t});
\t\t\t}
\t\t\telse{
\t\t\t\t\$(\"#editlocked\").show();
\t\t\t\t\$(\"#editopen\").hide();
\t\t\t\t\$(\".editactionbutton\").hide();
\t\t\t\t\$('input, textarea').prop('readonly', true);
\t\t\t\t\$('select').prop('disabled', true);
\t\t\t\t\$('form').each (function(){  
\t\t\t\tthis.reset();
\t\t\t\t}); 
\t\t\t\t\$('input, select, textarea').removeClass('changed');
\t\t\t}
\t\t});
\t\t";
        // line 488
        if ( !(null === (isset($context["id"]) ? $context["id"] : null))) {
            // line 489
            echo "\t\t\t\$(\"#editlocked\").show();
\t\t\t\$(\"#editopen\").hide();
\t\t\t\$(\".editactionbutton\").hide();
\t\t\t\$('input, textarea').prop('readonly', true);
\t\t\t\$('select').prop('disabled', true);
\t\t\t\$('form').each (function(){  
\t\t\t\tthis.reset();
\t\t\t}); 
\t\t\t\$('input, select, textarea').removeClass('changed');
\t\t";
        } else {
            // line 499
            echo "\t\t\t\$(\"#editlocked\").hide();
\t\t\t\$(\"#editopen\").show();
\t\t\t\$(\".editactionbutton\").show();
\t\t\t\$('input, select, textarea').prop('readonly', false);
\t\t\t\$('select').prop('disabled', false);
\t\t\t\$(\"#buttons\").hide();
\t\t";
        }
        // line 506
        echo "\t\t";
        if ((isset($context["start_unlocked"]) ? $context["start_unlocked"] : null)) {
            // line 507
            echo "\t\t\t\$(\"#editlocked\").hide();
\t\t\t\$(\"#editopen\").show();
\t\t\t\$(\".editactionbutton\").show();
\t\t\t\$('input, select, textarea').prop('readonly', false);
\t\t\t\$('select').prop('disabled', false);
\t\t";
        }
        // line 513
        echo "\t\t
\t\t\$(\"#accordion\" ).collapse()
\t\t\$(\"#stataccordion\" ).collapse();
\t\t\$(\"div.collapse\")
\t\t\t.on('shown.bs.collapse', function (e) {
\t\t\t\tif (!\$(this).is(e.target)) { return; }
\t\t\t\tlocalStorage.setItem(\"AccordionId\"+this.id,'show');
\t\t\t})
\t\t\t.on('hidden.bs.collapse', function (e) {
\t\t\t\tif (!\$(this).is(e.target)) { return; }
\t\t\t\tlocalStorage.setItem(\"AccordionId\"+this.id,'hide');
\t\t\t})
\t\t\t.each(function(){
\t\t\t\tif (localStorage.getItem(\"AccordionId\"+this.id) === null) {
\t\t\t\t\tlocalStorage.setItem(\"AccordionId\"+this.id,'hide');
\t\t\t\t}
\t\t\t\t\$( this ).collapse( localStorage.getItem(\"AccordionId\"+this.id ));
\t\t\t});
\t\t
\t\t
\t\t\$('.open-popup-link').magnificPopup({
\t\t\ttype:'inline',
\t\t\tcloseOnBgClick: false,
\t\t\tmidClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
\t\t\tcallbacks: {
\t\t\t\topen: function() {
\t\t\t\t\tconsole.log('Popup is opened');
\t\t\t\t\tformfuncs();
\t\t\t\t},
\t\t\t\tclose: function() {
\t\t\t\t\tconsole.log('Popup is closed');
\t\t\t\t\t\$(\"#form-BOM\")[0].reset();
\t\t\t\t\tformfuncs();
\t\t\t\t}
\t\t\t},
\t\t});

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
        // line 563
        echo (isset($context["ajax_route_history"]) ? $context["ajax_route_history"] : null);
        echo "\",
\t\t\t\t\t} );
\t\t\t\t},
\t\t\t},
\t\t});
\t\t\$(\".treetable\").treetable({
\t\t\texpandable: true,
\t\t\tclickableNodeNames: true,
\t\t});
\t});
</script>
";
        // line 574
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1061 => 574,  1047 => 563,  995 => 513,  987 => 507,  984 => 506,  975 => 499,  963 => 489,  961 => 488,  925 => 455,  920 => 453,  916 => 452,  908 => 446,  896 => 437,  892 => 436,  889 => 435,  855 => 404,  842 => 394,  837 => 392,  833 => 391,  830 => 390,  828 => 389,  790 => 354,  775 => 341,  769 => 337,  767 => 336,  726 => 298,  721 => 295,  717 => 293,  708 => 291,  704 => 290,  698 => 286,  689 => 284,  685 => 283,  675 => 276,  664 => 267,  649 => 265,  632 => 262,  629 => 261,  612 => 260,  609 => 259,  592 => 258,  587 => 255,  578 => 253,  574 => 252,  562 => 243,  551 => 234,  536 => 232,  519 => 229,  516 => 228,  499 => 227,  492 => 225,  482 => 223,  465 => 222,  460 => 219,  451 => 217,  447 => 216,  437 => 209,  427 => 202,  421 => 198,  419 => 197,  412 => 192,  404 => 189,  394 => 187,  392 => 186,  383 => 185,  381 => 184,  378 => 183,  372 => 182,  364 => 180,  356 => 178,  353 => 177,  349 => 176,  343 => 175,  340 => 174,  338 => 173,  333 => 171,  324 => 170,  322 => 169,  311 => 168,  309 => 167,  305 => 165,  301 => 163,  299 => 162,  294 => 161,  288 => 159,  286 => 158,  282 => 157,  279 => 156,  275 => 155,  268 => 151,  263 => 149,  258 => 146,  253 => 144,  249 => 143,  244 => 142,  239 => 139,  228 => 137,  224 => 136,  221 => 135,  219 => 134,  214 => 132,  206 => 127,  199 => 123,  190 => 117,  183 => 112,  175 => 108,  173 => 107,  167 => 103,  156 => 101,  152 => 100,  145 => 98,  138 => 96,  131 => 94,  125 => 93,  119 => 92,  113 => 91,  19 => 1,);
    }
}
/* {{ header }}{{ column_left }}*/
/* */
/* <div id="content">*/
/* 	<style>*/
/* 		.ui-autocomplete-loading {*/
/* 			background: white url("view/image/ui-anim_basic_16x16.gif") right center no-repeat;*/
/* 		}*/
/* 		.ui-autocomplete{*/
/* 			z-index:10000;*/
/* 		}*/
/* 		.white-popup {*/
/* 			position: relative;*/
/* 			background: #FFF;*/
/* 			width: auto;*/
/* 			max-width: 80%;*/
/* 			margin: 20px auto;*/
/* 		}*/
/* 		.white-popup .panel-heading {*/
/* 			color: #000000;*/
/* 			border-color: #dcdcdc;*/
/* 			background: #bfbfbf;*/
/* 			text-shadow: 0 -1px 0 rgba(50,50,50,0);*/
/* 		}*/
/* 		.editactionbutton{*/
/* 			display:none;*/
/* 			height: 36.4px;*/
/* 		}*/
/* 		textarea {*/
/* 			white-space: pre;*/
/* 			overflow: hidden;*/
/* 			resize: none;*/
/* 		}*/
/* 		.pull-right {*/
/* 			padding-bottom: 10px;*/
/* 		}*/
/* 		#buttons{*/
/* 			display: inline-block;*/
/* 		}*/
/* 		.ui-widget-overlay{*/
/* 			top: 0;*/
/* 			left: 0;*/
/* 			width: 100%;*/
/* 			height: 100%;*/
/* 			z-index: 1042;*/
/* 			overflow: hidden;*/
/* 			position: fixed;*/
/* 			background: #0b0b0b;*/
/* 			opacity: 0.8;*/
/* 		}*/
/* 		.panel {*/
/* 			margin-bottom:unset;*/
/* 		}*/
/* 		*/
/* 		a.collapsed .panel-title::before*/
/* 		{*/
/* 			font: normal normal normal 14px/1 FontAwesome;*/
/* 			content: "\f138";*/
/* 			padding-right: 15px;*/
/* 		}*/
/* 		a .panel-title::before*/
/* 		{*/
/* 			font: normal normal normal 14px/1 FontAwesome;*/
/* 			content: "\f13a";*/
/* 			padding-right: 15px;*/
/* 		}*/
/* 		*/
/* 		#BOMtree > thead > tr > th {*/
/* 			margin: 0;*/
/* 			padding: 2px;*/
/* 		}*/
/* 		#BOMtree > tbody > tr > td:nth-child(1) {*/
/* 			white-space: nowrap;*/
/* 			width: 1px;*/
/* 		}*/
/* 		#BOMtree > tbody > tr > td:nth-child(2),*/
/* 		#BOMtree > thead > tr > th:nth-child(2) {*/
/* 			width:35px;*/
/* 			text-align: center;*/
/* 		}*/
/* 		#BOMtree > tbody > tr > td:nth-child(3),*/
/* 		#BOMtree > thead > tr > th:nth-child(3) {*/
/* 			width:50px;*/
/* 			text-align: center;*/
/* 		}*/
/* */
/* 	</style>*/
/* 	<div class="page-header">*/
/* 		<div class="container-fluid">*/
/* 			<div class="pull-right">*/
/* 				<div id="buttons">*/
/* 					<a href="#duplicate-popup"							data-toggle="tooltip" title="{{ button_duplicate }}"	class="btn btn-primary open-popup-link editactionbutton"><i class="fa {{button_duplicate_icon}}"></i></a>*/
/* 					<button type="button"		id="editlocked"			data-toggle="tooltip" title="{{ button_enable_edit }}"	class="btn btn-primary"									><i class="fa {{button_enable_edit_icon}}"></i></button>*/
/* 					<button type="button"		id="editopen"			data-toggle="tooltip" title="{{ button_disable_edit }}"	class="btn btn-primary"									><i class="fa {{button_disable_edit_icon}}"></i></button>*/
/* 					<a href="#history-popup"	id="open_history-popup"	data-toggle="tooltip" title="{{ button_history }}"		class="btn btn-primary"									><i class="fa {{button_history_icon}}"></i></a>*/
/* 				</div>*/
/* 				<a href="{{ cancel }}"								data-toggle="tooltip" title="{{ button_cancel }}"		class="btn btn-default"									><i class="fa fa-reply"></i></a>*/
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
/* 		{% if error %}*/
/* 			<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error }}*/
/* 				<button type="button" class="close" data-dismiss="alert">&times;</button>*/
/* 			</div>	*/
/* 		{% endif %}*/
/* 		<div class="panel panel-default" id="prodaccordion">*/
/* 			<div class="panel panel-default">*/
/* 				<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_details">*/
/* 					<div class="panel-heading">*/
/* 						<h3 class="panel-title">*/
/* 							{{ text_view_details }}*/
/* 						</h3>*/
/* 					</div>*/
/* 				</a>*/
/* 				<div id="prod_details" class="panel-collapse collapse">*/
/* 					<div class="panel-body">*/
/* 						<form action="{{ action_part }}" method="post" enctype="multipart/form-data" id="form-record" class="form-horizontal">*/
/* 						*/
/* 							<div class="editactionbutton">*/
/* 								<div class="pull-right">*/
/* 									<input type="submit" data-toggle="tooltip" title="<i class='fa fa-save'></i>{{ button_save }}" class="btn btn-primary"></input>*/
/* 								</div>*/
/* 								<br>*/
/* 							</div>*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-2 control-label" for="input-id">{{ entry_partno }}</label>*/
/* 								<div class="col-sm-9 input-group">*/
/* 									{% if id is null %}*/
/* 										<select name="id" id="input-id" class="form-control" required>*/
/* 											{% for op in nextids %}*/
/* 												<option value="{{ op.val }}">{{ op.text }}</option>*/
/* 											{% endfor %}*/
/* 										</select>*/
/* 										<input type="hidden" name="rev" value="A" id="input-rev"/>*/
/* 									{% else %}*/
/* 										<input type="text" value=" {{ dispidrev }}" class="form-control" disabled />*/
/* 										<input type="hidden" name="id" value="{{ id }}" id="input-id"/>*/
/* 										<input type="hidden" name="rev" value="{{ rev }}" id="input-rev"/>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="form-group">*/
/* 								<label class="col-sm-2 control-label" for="input-name">{{ entry_name }}</label>*/
/* 								<div class="col-sm-9 input-group">*/
/* 									<input type="text" name="fields[name]"value="{{ name }}" id="input-name" class="form-control" />*/
/* 								</div>*/
/* 							</div>*/
/* 							*/
/* 							{% for field in fields %}*/
/* 								<div class="form-group">*/
/* 									<label class="col-sm-2 control-label" for="input-{{ field.name }}">*/
/* 										{% if field.tooltip|length > 1 %}*/
/* 											<span data-toggle="tooltip" title="" data-original-title="{{field.tooltip}}">*/
/* 										{% endif %}*/
/* 										{{ field.name|replace({'_': ' '}) }}*/
/* 										{% if field.tooltip|length > 1 %}*/
/* 											</span>*/
/* 										{% endif %}*/
/* 									</label>*/
/* 									<div class="col-sm-9 input-group">*/
/* 										{% if field.type == 1 %}*/
/* 											<textarea name="fields[{{ field.name }}]" placeholder="{{ entry_field }}" id="input-{{ field.name }}" class="form-control fitY">{{ field_data[field.name] }}</textarea>*/
/* 										{% elseif field.type == 2 %}*/
/* 											<input type="number" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control" value="{{ field_data[field.name] }}" step="0.001" />*/
/* 											<span class="input-group-addon">{{field.options[0]}}</span>*/
/* */
/* 										{% elseif field.type == 3 %}*/
/* 										*/
/* 											<select  name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control">*/
/* 												{% for k,v in field.options %}*/
/* 													{% if k == field_data[field.name] %}*/
/* 														<option value="{{k}}" selected >{{v}}</option>*/
/* 													{% else %}*/
/* 														<option value="{{k}}" >{{v}}</option>*/
/* 													{% endif %}*/
/* 												{% endfor %}*/
/* 											</select>*/
/* 										{% elseif field.type == 4 %}*/
/* 											<input type="text" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control datepicker" value="{{ field_data[field.name] }}" />*/
/* 										{% elseif field.type == 5 %}*/
/* 											<input type="text" name="fields[{{ field.name }}]" id="input-{{ field.name }}" class="form-control masked" data-inputmask-regex="£[0-9]{1,}\.[0-9]{2,}" value="{{ field_data[field.name] }}"  />*/
/* 										{% endif %}*/
/* 									</div>*/
/* 								</div>*/
/* 							{% endfor %}*/
/* 							*/
/* 						</form>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 			{% if id is not null %}*/
/* 				<div class="panel panel-default">*/
/* 					<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_BOM">*/
/* 						<div class="panel-heading">*/
/* 							<h3 class="panel-title">*/
/* 								<i class="fas fa-stream"></i>&nbsp;{{ text_BOM }}*/
/* 							</h3>*/
/* 						</div>*/
/* 					</a>*/
/* 					<div id="prod_BOM" class="panel-collapse collapse">*/
/* 						<div class="panel-body">*/
/* 							<div class="pull-right">*/
/* 								<a href="#BOMedit-popup" data-toggle="tooltip" title="{{ button_edit }}" class="btn btn-primary open-popup-link editactionbutton"><i class="fa fa-edit"></i></a>*/
/* 							</div>*/
/* 							*/
/* 							<table id="BOMtree" class="treetable">*/
/* 								<thead>*/
/* 									<tr>*/
/* 										<th>Part Number</th>*/
/* 										{% for col in bomcols %}*/
/* 											<th>{{col.name|replace({'_': ' '})}}</th>*/
/* 										{% endfor %}*/
/* 									</tr>*/
/* 								</thead>*/
/* 								<tbody>*/
/* 									{% for item in fullbom %}*/
/* 										<tr data-tt-id="{{item.id}}" data-tt-parent-id="{{item.parid}}" class="{{item.cls}}">*/
/* 											<td>*/
/* 												<img  src="{{item.icon}}" />&nbsp;{{item.partno}}*/
/* 											</td>*/
/* 											{% for col in bomcols %}*/
/* 												<td>*/
/* 												{{ include(template_from_string("{{item.data."~col.datapath~"}}")) }}*/
/* 												</td>*/
/* 											{% endfor %}*/
/* 										</tr>*/
/* 									{% endfor %}*/
/* 								</tbody>*/
/* 							</table>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="panel panel-default">*/
/* 					<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_usedon">*/
/* 						<div class="panel-heading">*/
/* 							<h3 class="panel-title">*/
/* 								<i class="fas fa-stream"></i>&nbsp;{{ text_usedon }}*/
/* 							</h3>*/
/* 						</div>*/
/* 					</a>*/
/* 					<div id="prod_usedon" class="panel-collapse collapse">*/
/* 						<div class="panel-body">*/
/* 							<table id="usedon" class="table table-bordered">*/
/* 								<thead>*/
/* 									<tr>*/
/* 										{% for col in usedoncols %}*/
/* 											<th>{{col.name|replace({'_': ' '})}}</th>*/
/* 										{% endfor %}*/
/* 									</tr>*/
/* 								</thead>*/
/* 								<tbody>*/
/* 									{% for item in usedon %}*/
/* 										<tr>*/
/* 											{% for col in usedoncols %}*/
/* 												<td>*/
/* 													{{ include(template_from_string("{{item."~col.datapath~"}}")) }}*/
/* 												</td>*/
/* 											{% endfor %}*/
/* 										</tr>*/
/* 									{% endfor %}*/
/* 								</tbody>*/
/* 							</table>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="panel panel-default">*/
/* 					<a data-toggle="collapse" data-parent="#prodaccordion" href="#prod_stat">*/
/* 						<div class="panel-heading">*/
/* 							<h3 class="panel-title">*/
/* 								<i class="fas fa-table"></i>&nbsp;{{ text_statistics }}*/
/* 							</h3>*/
/* 						</div>*/
/* 					</a>*/
/* 					<div id="prod_stat" class="panel-collapse collapse">*/
/* 						<div class="panel-body">*/
/* 							<div class="accordion" id="stataccordion">*/
/* 								{% for mod in statmodules %}*/
/* 									{{mod}}*/
/* 								{% endfor %}*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				{% for mod in modules %}*/
/* 					{{mod}}*/
/* 				{% endfor %}*/
/* 				*/
/* 			{% endif %}*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* {{ popups }}*/
/* <script>*/
/* 	$(function () {*/
/* 		*/
/* 		function autoresizeY(textarea) {*/
/* 			textarea.style.height = '0px';     //Reset height, so that it not only grows but also shrinks*/
/* 			var newheight = (textarea.scrollHeight+2);*/
/* 			if(newheight<36) {newheight=36;}*/
/* 			textarea.style.height = newheight + 'px';    //Set new height*/
/* 		}*/
/* 		function autoresizeX(textarea) {*/
/* 			textarea.style.width = '0px';*/
/* 			var newwidth = (textarea.scrollWidth+25);*/
/* 			if(newwidth<148.4) {newwidth=148.4;}*/
/* 			textarea.style.width = newwidth + 'px';*/
/* 		}*/
/* 		function formfuncs (){*/
/* 			$('.fitY').each(function ()		{ autoresizeY(this);	});*/
/* 			$('.fitY').keyup(function ()	{ autoresizeY(this);	});*/
/* 			$('.fitX').each(function ()		{ autoresizeX(this);	});*/
/* 			$('.fitX').keyup(function ()	{ autoresizeX(this);	});*/
/* 			*/
/* 			$('input, select, textarea').on('change', function() {*/
/* 				$(this).addClass('changed');*/
/* 			});*/
/* 			$('#bomedit input, #bomedit select, #bomedit textarea').on('change',function() {*/
/* 				$('#'+$.escapeSelector(this.parentElement.parentElement.children[0].children[0].id)).addClass('changed');*/
/* 				$('#'+$.escapeSelector(this.parentElement.parentElement.children[1].children[0].id)).addClass('changed');*/
/* 			});*/
/* 			*/
/* 			$('form input').keydown(function (e) {*/
/* 				if (e.keyCode == 13) {*/
/* 					e.preventDefault();*/
/* 					return false;*/
/* 				}*/
/* 			});*/
/* 			$('form').on('submit', function(e) {*/
/* 				$('input, textarea, select').prop('disabled', false);*/
/* 				{% if id is not null %}*/
/* 					$(	'input[type!="hidden"]:not([required]):not(.changed)').prop('disabled', true);*/
/* 					$(	'textarea:not([required]):not(.changed)').prop('disabled', true);*/
/* 					$(	'select:not([required]):not(.changed)').prop('disabled', true);*/
/* 				{% endif %}*/
/* */
/* 				var nchanged = ($('.changed').length == 0);*/
/* 				if(nchanged){*/
/* 					e.preventDefault();*/
/* 					$.magnificPopup.close();*/
/* 					$('input, textarea, select').prop('disabled', false);*/
/* 					$("#editopen").trigger( "click" );*/
/* 				}*/
/* 			});*/
/* 			$(".datepicker").datepicker();*/
/* 			*/
/* 			$(".masked").inputmask();*/
/* 			$(".partnumber" ).autocomplete({*/
/* 				source: decodeURIComponent("{{searchproducturl}}"),*/
/* 				minLength: 2,*/
/* 				autoFocus: true,*/
/* 				select: function(event,ui){*/
/* 					console.log(ui);*/
/* 					var id = event.target.id;*/
/* 					var ix = /\[([0-9]*)\]/gm.exec(id)[1];*/
/* 					var rev = $("#"+$.escapeSelector("input-rootbom["+ix+"][child_rev]"));*/
/* 					rev.empty();*/
/* 					rev.append($('<option>', {*/
/* 							value: '+',*/
/* 							text: '+ : Latest'*/
/* 						}));*/
/* 					$.each(ui.item.revs,function(k,v){*/
/* 						rev.append($('<option>', {*/
/* 							value: v,*/
/* 							text: v*/
/* 						}));*/
/* 					});*/
/* 				}*/
/* 			});*/
/* 		}*/
/* 		formfuncs();*/
/* 		*/
/* 		$("#bomedit").dynamiclist({*/
/* 			maxSize: 300,*/
/* 			addCallbackFn: function(item){*/
/* 				console.log('added line');*/
/* 				*/
/* 				item.find('input[type!="hidden"][type!="checkbox"], textarea, select').prop('required', true);*/
/* 				formfuncs();*/
/* 			},*/
/* 		});*/
/* */
/* 		$("#editlocked").click( function(){*/
/* 			{% if RW_permission %}*/
/* 				BootstrapDialog.show({*/
/* 					title: '{{confirm_edit_title}}',*/
/* 					message: '{{confirm_edit}}',*/
/* 					buttons: [{*/
/* 						label: '{{confirm_edit_options.edit}}',*/
/* 						action: function(dialog) {*/
/* 							$("#editlocked").hide();*/
/* 							$("#editopen").show();*/
/* 							$(".editactionbutton").show();*/
/* 							$('input, select, textarea').not( "[forced_readonly='True']" ).prop('readonly', false);*/
/* 							$('select').not( "[forced_readonly='True']" ).prop('disabled', false);*/
/* 							dialog.close();*/
/* 						}*/
/* 					}, {*/
/* 						label: "{{confirm_edit_options.duplicate}}",*/
/* 						action: function(dialog) {*/
/* 							$.magnificPopup.open({*/
/* 								items:{*/
/* 									type:'inline',*/
/* 									src: "#duplicate-popup",*/
/* 								},*/
/* 								closeOnBgClick: false,*/
/* 								callbacks: {*/
/* 									open: function() {*/
/* 										console.log('Popup is opened');*/
/* 										formfuncs();*/
/* 									},*/
/* 									close: function() {*/
/* 										console.log('Popup is closed');*/
/* 										formfuncs();*/
/* 									}*/
/* 								},*/
/* 							});*/
/* 							$('input, select, textarea').prop('readonly', false);*/
/* 							$('select').prop('disabled', false);*/
/* 							dialog.close();*/
/* 						}*/
/* 					}, {*/
/* 						label: "Cancel",*/
/* 						action: function(dialog) {*/
/* 							dialog.close();*/
/* 						}*/
/* 					}]*/
/* 				});*/
/* 			{% else %}*/
/* 				BootstrapDialog.show({*/
/* 					title: '{{no_edit_title}}',*/
/* 					message: '{{no_edit}}',*/
/* 					buttons: [{*/
/* 						label: "Cancel",*/
/* 						action: function(dialog) {*/
/* 							dialog.close();*/
/* 						}*/
/* 					}]*/
/* 				});*/
/* 			{% endif %}*/
/* 		});*/
/* 		$("#editopen").click( function(){*/
/* 		*/
/* 			if ($(".changed").length ) {*/
/* 			*/
/* 				BootstrapDialog.show({*/
/* 					title: '{{confirm_loss_title}}',*/
/* 					message: '{{confirm_loss}}',*/
/* 					buttons: [{*/
/* 						label: '{{confirm_loss_options.clear}}',*/
/* 						action: function(dialog) {*/
/* 							$("#editlocked").show();*/
/* 							$("#editopen").hide();*/
/* 							$(".editactionbutton").hide();*/
/* 							$('input, textarea').prop('readonly', true);*/
/* 							$('select').prop('disabled', true);*/
/* 							$('form').each (function(){  */
/* 								this.reset();*/
/* 							}); */
/* 							$('input, select, textarea').removeClass('changed');*/
/* 							dialog.close();*/
/* 						}*/
/* 					}, {*/
/* 						label: "Cancel",*/
/* 						action: function(dialog) {*/
/* 							dialog.close();*/
/* 						}*/
/* 					}]*/
/* 				});*/
/* 			}*/
/* 			else{*/
/* 				$("#editlocked").show();*/
/* 				$("#editopen").hide();*/
/* 				$(".editactionbutton").hide();*/
/* 				$('input, textarea').prop('readonly', true);*/
/* 				$('select').prop('disabled', true);*/
/* 				$('form').each (function(){  */
/* 				this.reset();*/
/* 				}); */
/* 				$('input, select, textarea').removeClass('changed');*/
/* 			}*/
/* 		});*/
/* 		{% if (id is not null) %}*/
/* 			$("#editlocked").show();*/
/* 			$("#editopen").hide();*/
/* 			$(".editactionbutton").hide();*/
/* 			$('input, textarea').prop('readonly', true);*/
/* 			$('select').prop('disabled', true);*/
/* 			$('form').each (function(){  */
/* 				this.reset();*/
/* 			}); */
/* 			$('input, select, textarea').removeClass('changed');*/
/* 		{% else %}*/
/* 			$("#editlocked").hide();*/
/* 			$("#editopen").show();*/
/* 			$(".editactionbutton").show();*/
/* 			$('input, select, textarea').prop('readonly', false);*/
/* 			$('select').prop('disabled', false);*/
/* 			$("#buttons").hide();*/
/* 		{% endif %}*/
/* 		{% if start_unlocked %}*/
/* 			$("#editlocked").hide();*/
/* 			$("#editopen").show();*/
/* 			$(".editactionbutton").show();*/
/* 			$('input, select, textarea').prop('readonly', false);*/
/* 			$('select').prop('disabled', false);*/
/* 		{% endif %}*/
/* 		*/
/* 		$("#accordion" ).collapse()*/
/* 		$("#stataccordion" ).collapse();*/
/* 		$("div.collapse")*/
/* 			.on('shown.bs.collapse', function (e) {*/
/* 				if (!$(this).is(e.target)) { return; }*/
/* 				localStorage.setItem("AccordionId"+this.id,'show');*/
/* 			})*/
/* 			.on('hidden.bs.collapse', function (e) {*/
/* 				if (!$(this).is(e.target)) { return; }*/
/* 				localStorage.setItem("AccordionId"+this.id,'hide');*/
/* 			})*/
/* 			.each(function(){*/
/* 				if (localStorage.getItem("AccordionId"+this.id) === null) {*/
/* 					localStorage.setItem("AccordionId"+this.id,'hide');*/
/* 				}*/
/* 				$( this ).collapse( localStorage.getItem("AccordionId"+this.id ));*/
/* 			});*/
/* 		*/
/* 		*/
/* 		$('.open-popup-link').magnificPopup({*/
/* 			type:'inline',*/
/* 			closeOnBgClick: false,*/
/* 			midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.*/
/* 			callbacks: {*/
/* 				open: function() {*/
/* 					console.log('Popup is opened');*/
/* 					formfuncs();*/
/* 				},*/
/* 				close: function() {*/
/* 					console.log('Popup is closed');*/
/* 					$("#form-BOM")[0].reset();*/
/* 					formfuncs();*/
/* 				}*/
/* 			},*/
/* 		});*/
/* */
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
/* 		$(".treetable").treetable({*/
/* 			expandable: true,*/
/* 			clickableNodeNames: true,*/
/* 		});*/
/* 	});*/
/* </script>*/
/* {{ footer }}*/
/* */
