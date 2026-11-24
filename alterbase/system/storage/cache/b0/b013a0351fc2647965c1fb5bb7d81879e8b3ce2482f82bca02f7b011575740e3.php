<?php

/* extension/dashboard/clocking_status_dash.twig */
class __TwigTemplate_fb227031955f3f757b269d655479f2721237c1aff0a25e65e762874206d61dc6 extends Twig_Template
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
\t\t#statuses .left {
\t\t\tborder-radius: 27.5px 0px 0px 27.5px;
\t\t\tpadding: 0px;
\t\t\tpadding-right:5px;
\t\t\tborder-left: 1px solid #000000;
\t\t\tborder-top: 1px solid #000000;
\t\t\tborder-bottom: 1px solid #000000;
\t\t}
\t\t#statuses .center {
\t\t\tpadding: 0px;
\t\t\tborder-top: 1px solid #000000;
\t\t\tborder-bottom: 1px solid #000000;
\t\t}
\t\t#statuses .right {
\t\t\tborder-radius: 0px 27.5px 27.5px 0px;
\t\t\tpadding: 0px;
\t\t\tborder-right: 1px solid #000000;
\t\t\tborder-top: 1px solid #000000;
\t\t\tborder-bottom: 1px solid #000000;
\t\t}
\t\t#statuses table th {
\t\t\tpadding-left:5px;
\t\t\tpadding-right:5px;
\t\t\ttext-align: right;
\t\t}
\t\t#statuses table td {
\t\t\tpadding-left:5px;
\t\t\tpadding-right:5px;
\t\t}
\t\t
\t</style>
\t
\t<script>
\t\t\$( window ).resize(function() {
\t\t\tvar w = \$('#statuses').width();
\t\t\tif(w<340){
\t\t\t\t\$('#statuses .tohide').hide();
\t\t\t}else{
\t\t\t\t\$('#statuses .tohide').show();
\t\t\t}
\t\t});
\t</script>
\t<div class=\"panel-body\">
\t\t<div class=\"row\">
\t\t\t<table id=\"statuses\" style=\"width: 100%; border-collapse: separate; border-spacing: 0px 5px;\">
\t\t\t\t";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["usersCurrentStatus"]) ? $context["usersCurrentStatus"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 54
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"left\" style=\"";
            // line 55
            echo $this->getAttribute($context["user"], "style", array());
            echo "\">
\t\t\t\t\t\t\t<img src=\"";
            // line 56
            echo $this->getAttribute($context["user"], "image", array());
            echo "\" alt=\"";
            echo $this->getAttribute($context["user"], "firstname", array());
            echo " ";
            echo $this->getAttribute($context["user"], "lastname", array());
            echo "\" class=\"img-circle\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"center\" style=\"";
            // line 58
            echo $this->getAttribute($context["user"], "style", array());
            echo "\">
\t\t\t\t\t\t\t";
            // line 59
            echo $this->getAttribute($context["user"], "firstname", array());
            echo " ";
            echo $this->getAttribute($context["user"], "lastname", array());
            echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"center tohide\" style=\"";
            // line 61
            echo $this->getAttribute($context["user"], "style", array());
            echo "\">
\t\t\t\t\t\t\t<table style=\"font-size: 10px;\">
\t\t\t\t\t\t\t\t";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["user"], "times", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["time"]) {
                // line 64
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>";
                // line 65
                echo $this->getAttribute($context["time"], "name", array());
                echo "</th>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 66
                echo $this->getAttribute($context["time"], "length", array());
                echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 68
                if ($this->getAttribute($context["time"], "running", array())) {
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<img  src=\"view/image/timer.gif\" style=\"height: 15px;\"/>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 71
                echo "\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['time'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"right\" style=\"";
            // line 76
            echo $this->getAttribute($context["user"], "style", array());
            echo "\">
\t\t\t\t\t\t\t";
            // line 77
            echo $this->getAttribute($context["user"], "state", array());
            echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "\t\t\t</table>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/dashboard/clocking_status_dash.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 81,  150 => 77,  146 => 76,  142 => 74,  134 => 71,  130 => 69,  128 => 68,  123 => 66,  119 => 65,  116 => 64,  112 => 63,  107 => 61,  100 => 59,  96 => 58,  87 => 56,  83 => 55,  80 => 54,  76 => 53,  24 => 4,  19 => 1,);
    }
}
/* <div class="panel panel-default">*/
/* 	<div class="panel-heading">*/
/* 		<h3 class="panel-title">*/
/* 			<i class="fa fa-server"></i> {{ heading_title }}*/
/* 		</h3>*/
/* 	</div>*/
/* 	<style>*/
/* 		#statuses .left {*/
/* 			border-radius: 27.5px 0px 0px 27.5px;*/
/* 			padding: 0px;*/
/* 			padding-right:5px;*/
/* 			border-left: 1px solid #000000;*/
/* 			border-top: 1px solid #000000;*/
/* 			border-bottom: 1px solid #000000;*/
/* 		}*/
/* 		#statuses .center {*/
/* 			padding: 0px;*/
/* 			border-top: 1px solid #000000;*/
/* 			border-bottom: 1px solid #000000;*/
/* 		}*/
/* 		#statuses .right {*/
/* 			border-radius: 0px 27.5px 27.5px 0px;*/
/* 			padding: 0px;*/
/* 			border-right: 1px solid #000000;*/
/* 			border-top: 1px solid #000000;*/
/* 			border-bottom: 1px solid #000000;*/
/* 		}*/
/* 		#statuses table th {*/
/* 			padding-left:5px;*/
/* 			padding-right:5px;*/
/* 			text-align: right;*/
/* 		}*/
/* 		#statuses table td {*/
/* 			padding-left:5px;*/
/* 			padding-right:5px;*/
/* 		}*/
/* 		*/
/* 	</style>*/
/* 	*/
/* 	<script>*/
/* 		$( window ).resize(function() {*/
/* 			var w = $('#statuses').width();*/
/* 			if(w<340){*/
/* 				$('#statuses .tohide').hide();*/
/* 			}else{*/
/* 				$('#statuses .tohide').show();*/
/* 			}*/
/* 		});*/
/* 	</script>*/
/* 	<div class="panel-body">*/
/* 		<div class="row">*/
/* 			<table id="statuses" style="width: 100%; border-collapse: separate; border-spacing: 0px 5px;">*/
/* 				{% for user in usersCurrentStatus %}*/
/* 					<tr>*/
/* 						<td class="left" style="{{user.style}}">*/
/* 							<img src="{{ user.image }}" alt="{{ user.firstname }} {{ user.lastname }}" class="img-circle" />*/
/* 						</td>*/
/* 						<td class="center" style="{{user.style}}">*/
/* 							{{ user.firstname }} {{ user.lastname }}*/
/* 						</td>*/
/* 						<td class="center tohide" style="{{user.style}}">*/
/* 							<table style="font-size: 10px;">*/
/* 								{% for time in user.times %}*/
/* 									<tr>*/
/* 										<th>{{time.name}}</th>*/
/* 										<td>{{time.length}}</td>*/
/* 										<td>*/
/* 											{% if time.running %}*/
/* 												<img  src="view/image/timer.gif" style="height: 15px;"/>*/
/* 											{% endif %}*/
/* 										</td>*/
/* 									</tr>*/
/* 								{% endfor %}*/
/* 							</table>*/
/* 						</td>*/
/* 						<td class="right" style="{{user.style}}">*/
/* 							{{ user.state }}*/
/* 						</td>*/
/* 					</tr>*/
/* 				{% endfor %}*/
/* 			</table>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
