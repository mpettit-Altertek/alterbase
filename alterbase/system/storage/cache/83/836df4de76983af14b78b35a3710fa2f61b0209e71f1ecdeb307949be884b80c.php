<?php

/* extension/dashboard/NotificationCentre_dash.twig */
class __TwigTemplate_cd1491716edd198cb16a92a8cf9319bd907c4f8004b053a08660d17d1f26e1cd extends Twig_Template
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
\t<style>
\t</style>
\t<div class=\"panel-body\">
\t\t<div class=\"row\">
\t\t\t";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["Notifications"]) ? $context["Notifications"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["Notification"]) {
            // line 12
            echo "\t\t\t\t";
            echo $context["Notification"];
            echo "
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Notification'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/dashboard/NotificationCentre_dash.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 14,  38 => 12,  34 => 11,  24 => 4,  19 => 1,);
    }
}
/* <div class="panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title">*/
/* 			<i class="fa fa-server"></i> {{ heading_title }}*/
/* 		</h3>*/
/* 	</div>*/
/* 	<style>*/
/* 	</style>*/
/* 	<div class="panel-body">*/
/* 		<div class="row">*/
/* 			{% for Notification in Notifications %}*/
/* 				{{Notification}}*/
/* 			{% endfor %}*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
