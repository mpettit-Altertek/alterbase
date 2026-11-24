<?php

/* extension/MRP/productview_weee.twig */
class __TwigTemplate_2d71128aa2038006bdb1d2df6865fb39def2dadf3e3c0647880e2e7e7a3b8f82 extends Twig_Template
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
        echo "<div class=\"panel panel-default\">
\t<a data-toggle=\"collapse\" data-parent=\"#stataccordion\" href=\"#prod_stat_WEEE\">
\t\t<div class=\"panel-heading\">
\t\t\t<h3 class=\"panel-title\">
\t\t\t\t<i class=\"fas ";
        // line 5
        echo (isset($context["heading_icon"]) ? $context["heading_icon"] : null);
        echo "\"></i>&nbsp;";
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "
\t\t\t</h3>
\t\t</div>
\t</a>
\t<div id=\"prod_stat_WEEE\" class=\"panel-collapse collapse\">
\t\t<div class=\"panel-body\">
\t\t\t<table class=\"table table-bordered\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dtable"]) ? $context["dtable"] : null), "cols", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 15
            echo "\t\t\t\t\t\t\t<th>";
            echo twig_replace_filter($this->getAttribute($context["col"], "header", array()), array("_" => " "));
            echo "</th>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dtable"]) ? $context["dtable"] : null), "rows", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 21
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dtable"]) ? $context["dtable"] : null), "cols", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
                // line 23
                echo "\t\t\t\t\t\t\t\t<td>";
                echo $this->getAttribute($context["item"], $this->getAttribute($context["col"], "datapath", array()), array(), "array");
                echo "</div></td>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t\t\t\t</tbody>
\t\t\t\t<tfoot>
\t\t\t\t\t<tr>
\t\t\t\t\t\t";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dtable"]) ? $context["dtable"] : null), "cols", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["col"]) {
            // line 31
            echo "\t\t\t\t\t\t\t<th>";
            echo twig_replace_filter($this->getAttribute($context["col"], "footer", array()), array("_" => " "));
            echo "</th>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['col'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t\t\t</tr>
\t\t\t\t</tfoot>
\t\t\t</table>
\t\t</div>
\t</div>
</div>


";
    }

    public function getTemplateName()
    {
        return "extension/MRP/productview_weee.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 33,  93 => 31,  89 => 30,  84 => 27,  77 => 25,  68 => 23,  64 => 22,  61 => 21,  57 => 20,  52 => 17,  43 => 15,  39 => 14,  25 => 5,  19 => 1,);
    }
}
/* <div class="panel panel-default">*/
/* 	<a data-toggle="collapse" data-parent="#stataccordion" href="#prod_stat_WEEE">*/
/* 		<div class="panel-heading">*/
/* 			<h3 class="panel-title">*/
/* 				<i class="fas {{heading_icon}}"></i>&nbsp;{{ heading_title }}*/
/* 			</h3>*/
/* 		</div>*/
/* 	</a>*/
/* 	<div id="prod_stat_WEEE" class="panel-collapse collapse">*/
/* 		<div class="panel-body">*/
/* 			<table class="table table-bordered">*/
/* 				<thead>*/
/* 					<tr>*/
/* 						{% for col in dtable.cols %}*/
/* 							<th>{{col.header|replace({'_': ' '})}}</th>*/
/* 						{% endfor %}*/
/* 					</tr>*/
/* 				</thead>*/
/* 				<tbody>*/
/* 					{% for item in dtable.rows %}*/
/* 						<tr>*/
/* 							{% for col in dtable.cols %}*/
/* 								<td>{{item[col.datapath]}}</div></td>*/
/* 							{% endfor %}*/
/* 						</tr>*/
/* 					{% endfor %}*/
/* 				</tbody>*/
/* 				<tfoot>*/
/* 					<tr>*/
/* 						{% for col in dtable.cols %}*/
/* 							<th>{{col.footer|replace({'_': ' '})}}</th>*/
/* 						{% endfor %}*/
/* 					</tr>*/
/* 				</tfoot>*/
/* 			</table>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* */
/* */
/* */
