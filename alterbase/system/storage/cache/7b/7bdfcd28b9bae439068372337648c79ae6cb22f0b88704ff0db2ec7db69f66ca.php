<?php

/* extension/dashboard/clocking_controls_dash.twig */
class __TwigTemplate_12901d79b81741d004337479d39546c9c7453a21503363316536b19bcb3468da extends Twig_Template
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
\t<div class=\"panel-heading\">
\t\t<h3 class=\"panel-title\">
\t\t\t<i class=\"fa fa-server\"></i> ";
        // line 4
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "
\t\t</h3>
\t</div>
\t<div class=\"panel-body\">
\t\t<div class=\"row\">
\t\t\t";
        // line 9
        echo (isset($context["buttons"]) ? $context["buttons"] : null);
        echo "
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/dashboard/clocking_controls_dash.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  24 => 4,  19 => 1,);
    }
}
/* <div class="panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title">*/
/* 			<i class="fa fa-server"></i> {{ heading_title }}*/
/* 		</h3>*/
/* 	</div>*/
/* 	<div class="panel-body">*/
/* 		<div class="row">*/
/* 			{{buttons}}*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
