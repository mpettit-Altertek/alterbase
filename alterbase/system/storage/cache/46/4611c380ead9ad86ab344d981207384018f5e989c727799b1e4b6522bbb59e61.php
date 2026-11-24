<?php

/* extension/module/clocking/calendar.twig */
class __TwigTemplate_37284bd93c3681386b3d61d1ce83e2e7033f86bdb675ac29e07ffa06d00eabd1 extends Twig_Template
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
\t\t\t\t<div id=\"wksummary\"></div>
\t\t\t\t<br>
\t\t\t\t<select id='users' class=\"form-control\">
\t\t\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            // line 24
            echo "\t\t\t\t\t\t<option value=\"";
            echo $this->getAttribute($context["opt"], "id", array());
            echo "\">";
            echo $this->getAttribute($context["opt"], "name", array());
            echo "</option>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t\t</select>
\t\t\t\t<div id=\"scheduler_here\" class=\"dhx_cal_container\" style=\"width:100%; height:700px;\">
\t\t\t\t\t<div class=\"dhx_cal_navline\">
\t\t\t\t\t\t<div class=\"dhx_dummy dhx_cal_today_button\" style='right:220px' onclick='scheduler.addEventNow()'>Add event</div>
\t\t\t\t\t\t<div class=\"dhx_cal_prev_button\">&nbsp;</div>
\t\t\t\t\t\t<div class=\"dhx_cal_next_button\">&nbsp;</div>
\t\t\t\t\t\t<div class=\"dhx_cal_today_button\"></div>
\t\t\t\t\t\t<div class=\"dhx_cal_date\"></div>
\t\t\t\t\t\t<div class=\"dhx_cal_tab\" name=\"day_tab\"></div>
\t\t\t\t\t\t<div class=\"dhx_cal_tab\" name=\"week_tab\"></div>
\t\t\t\t\t\t<div class=\"dhx_cal_tab\" name=\"month_tab\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"dhx_cal_header\"></div>
\t\t\t\t\t<div class=\"dhx_cal_data\"></div>
\t\t\t\t</div>
\t\t\t\t<div id=\"legend\">
\t\t\t\t\t";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sources"]) ? $context["sources"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 43
            echo "\t\t\t\t\t\t<div style=\"background-color:";
            echo $this->getAttribute($context["key"], "color", array());
            echo ";color:";
            echo $this->getAttribute($context["key"], "textColor", array());
            echo ";\">";
            echo $this->getAttribute($context["key"], "name", array());
            echo "</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<style type=\"text/css\" >
\thtml, body {
\t\tmargin: 0;
\t\tpadding: 0;
\t}
\t/* the background color for the whole container and its border*/
\t.my_event {
\t\tcolor:#FFFFFF;
\t\tbackground-color: #1796b0;
\t\tborder: 1px solid #778899;
\t\toverflow: hidden;
\t\t
\t\tclip-path: 
\t\t\tpolygon(
\t\t\t\t0% 0px,\t\t\t\t\t\t\t\t/* top left */
\t\t\t\t0px 0%,\t\t\t\t\t\t\t\t/* top left */
\t\t\t\t
\t\t\t\tcalc(100% - 0px) 0%,\t\t\t\t/* top right */
\t\t\t\t100% 0px,\t\t\t\t\t\t\t/* top right */
\t\t\t\t
\t\t\t\t100% calc(100% - 100%),\t/* bottom right */
\t\t\t\tcalc(100% - 50%) 100%,\t/* bottom right */
\t\t\t\t
\t\t\t\t50% 100%,\t\t\t\t/* bottom left */
\t\t\t\t0 calc(100% - 100%)\t\t/* bottom left */
\t\t\t);
\t}
\t
\t/* disabling the default color for the select menu */
\t.dhx_cal_select_menu.my_event div {
\t\tborder: 0;
\t\tbackground-color: transparent;
\t\tcolor: black;
\t}    
\t/* styles for the event content */
\t.dhx_cal_event.my_event .my_event_body {
\t\tpadding-top: 3px;
\t\tpadding-left: 5px;
\t\ttext-align: center;
\t}   
\t/* event's date information */
\t.my_event .event_date {         
\t\tfont-weight: bold;
\t\tpadding-right: 5px;
\t}   
\t/* event's resizing section */
\t.my_event_resize {
\t\theight: 3px;
\t\tposition: absolute;
\t\tbottom: -1px;
\t}
\t/* event's move section */
\t.my_event_move {
\t\tposition: absolute;
\t\ttop: 0;
\t\theight: 10px;
\t\tcursor: pointer;
\t}
\t.my_event_title {
\t\theight: 12px;
\t\tborder-width: 1px 1px 0 1px;
\t\tborder-bottom-style: dotted;
\t\tborder-radius: 4px 4px 0 0;
\t\tfont-size: 12px;
\t\tline-height: 12px;
\t\tfont-weight: 700;
\t\ttext-align: center;
\t\tbackground-position: right;
\t\tbackground-repeat: no-repeat;
\t\tpadding: 1px 0 0 0;
\t\tcursor: pointer;
\t}
\t#legend{
\t\ttext-align: center;
\t}
\t#legend div {
\t\tfont-size: 20px;
\t\tline-height: 0px;
\t\tpadding: 17px;
\t\tborder-radius: 10px;
\t\tfont-family: 'Times New Roman', Times, serif;
\t\tfont-weight: normal;
\t\ttext-decoration: none;
\t\tfont-style: normal;
\t\tfont-variant: normal;
\t\ttext-transform: uppercase;
\t\tdisplay: inline-block;
\t\tmin-width:200px;
\t\tmargin: 10px;
\t\ttext-align: center;
\t\twhite-space: nowrap;
\t}

</style>
<script>
\tvar footer = null;
\tfunction reload(){
\t\tscheduler.clearAll();
\t\tvar val = \$('#users').val();
\t\tscheduler.load(\"";
        // line 149
        echo (isset($context["ajax_Calendar"]) ? $context["ajax_Calendar"] : null);
        echo "&user_id=\"+val,function(){

\t\t\tvar schedulerNode = document.querySelector(\"#scheduler_here\");
\t\t\tvar header = schedulerNode.querySelector(\".dhx_cal_header\");
\t\t\t
\t\t\tif((scheduler._mode === \"week\") || (scheduler._mode === \"day\")){
\t\t\t\tif(!footer){
\t\t\t\t\tfooter = document.createElement(\"div\");
\t\t\t\t\tfooter.id = \"scheduler_footer\";
\t\t\t\t\tfooter.style.position = \"relative\";
\t\t\t\t\tfooter.style.bottom = \"110px\";
\t\t\t\t\tschedulerNode.parentNode.insertBefore(footer, schedulerNode.nextSibling);
\t\t\t\t}

\t\t\t\tvar footerContent = header.cloneNode(true);
\t\t\t\tfooterContent.style.borderBottom = \"1px solid #CECECE\";
\t\t\t\tfooter.innerHTML = \"\";
\t\t\t\tfooter.appendChild(footerContent);
\t\t\t\t\t\t
\t\t\t\t
\t\t\t\t\$('#scheduler_footer div').children('div').each(function () {
\t\t\t\t\tvar oldhtml = \$(this).html();
\t\t\t\t\tvar mydate = moment(oldhtml,'dddd DD/MM/YYYY').format('YYYY-MM-DD');
\t\t\t\t\tvar me = \$(this);
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\turl: \"";
        // line 175
        echo (isset($context["ajax_getcumulativeEventTime"]) ? $context["ajax_getcumulativeEventTime"] : null);
        echo "\",
\t\t\t\t\t\tdata: {\"date\": mydate ,\"period\": 'day' , \"user_id\" : \$('#users').val()},
\t\t\t\t\t\tsuccess: function (result) {
\t\t\t\t\t\t\tconsole.log([\"processing day\",oldhtml,mydate,result])
\t\t\t\t\t\t\tvar str = \"<table width='100%'>\";
\t\t\t\t\t\t\tfor (var key in result) {
\t\t\t\t\t\t\t\tstr += \"\t<tr>\";
\t\t\t\t\t\t\t\tstr += \"\t\t<td style='text-align: right;'>\"+result[key].name+\"</td>\";
\t\t\t\t\t\t\t\tstr += \"\t\t<td>\"+result[key].length+\"</td>\";
\t\t\t\t\t\t\t\tstr += \"\t\t<td>\";
\t\t\t\t\t\t\t\tif(result[key].running=='1'){
\t\t\t\t\t\t\t\t\tstr += \"\t\t<img  src='view/image/timer.gif' style='height: 15px;'/>\";
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\tstr += \"\t\t</td>\";
\t\t\t\t\t\t\t\tstr += \"\t</tr>\";
\t\t\t\t\t\t\t};
\t\t\t\t\t\t\tstr += \"</table>\";
\t\t\t\t\t\t\tme.html(str);
\t\t\t\t\t\t},
\t\t\t\t\t});
\t\t\t\t});
\t\t\t\t
\t\t\t\tif(scheduler._mode ==\"week\"){
\t\t\t\t\tvar mydate = moment(scheduler.getState().min_date).format('YYYY-MM-DD');
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\turl: \"";
        // line 201
        echo (isset($context["ajax_getcumulativeEventTime"]) ? $context["ajax_getcumulativeEventTime"] : null);
        echo "\",
\t\t\t\t\t\tdata: {\"date\": mydate ,\"period\": 'week' , \"user_id\" : \$('#users').val()},
\t\t\t\t\t\tsuccess: function (result) {
\t\t\t\t\t\t\tconsole.log([\"processing wk\",result])
\t\t\t\t\t\t\t
\t\t\t\t\t\t\tvar str = \"\";
\t\t\t\t\t\t\tstr += \"<table class='table table-bordered'>\";
\t\t\t\t\t\t\tstr += \"\t<tr style='background: #f6f6f6;'>\";
\t\t\t\t\t\t\tstr += \"\t<th colspan=2>Week summary</th>\";
\t\t\t\t\t\t\tstr += \"\t</tr>\";
\t\t\t\t\t\t\tfor (var key in result) {
\t\t\t\t\t\t\t\tstr += \"\t<tr>\";
\t\t\t\t\t\t\t\tstr += \"\t\t<th>\"+result[key].name+\"</th>\";
\t\t\t\t\t\t\t\tstr += \"\t\t<td>\"+result[key].length+\"&nbsp;\";
\t\t\t\t\t\t\t\tif(result[key].running=='1'){
\t\t\t\t\t\t\t\t\tstr += \"\t\t<img  src='view/image/timer.gif' style='height: 15px;'/>\";
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\tstr += \"\t\t</td>\";
\t\t\t\t\t\t\t\tstr += \"\t</tr>\";
\t\t\t\t\t\t\t};
\t\t\t\t\t\t\tstr += \"</table>\";
\t\t\t\t\t\t\t\$('#wksummary').html(str);
\t\t\t\t\t\t},
\t\t\t\t\t});
\t\t\t\t}else{
\t\t\t\t\t\$('#wksummary').html(\"\");
\t\t\t\t}
\t\t\t}
\t\t\telse{
\t\t\t\tif(footer){
\t\t\t\t\t\$(\"#\"+footer.id).remove();
\t\t\t\t\tfooter = null;
\t\t\t\t}
\t\t\t}
\t\t});
\t};

\tscheduler.attachEvent(\"onViewChange\",\t\t\tfunction (new_mode , new_date)\t{ reload(); });
\tscheduler.attachEvent(\"onAfterSchedulerResize\",\tfunction()\t\t\t\t\t\t{ reload(); });

\tscheduler.setLoadMode(\"day\");
\tscheduler.templates.hour_scale = function(date){
\t\tvar format = scheduler.date.date_to_str(\"%H:%i\");
\t\tvar step = 60;
\t\tvar html=\"\";
\t\tfor (var i=0; i<60/step; i++){
\t\t\thtml+=\"<div style='height:11px;line-height:11px;'>\"+format(date)+\"</div>\";
\t\t\tdate = scheduler.date.add(date,step,\"minute\");
\t\t}
\t\treturn html;
\t}
\t
\tscheduler.config.hour_size_px = 22;
\tscheduler.config.separate_short_events = true;
\tscheduler.config.show_loading = true;
\tscheduler.config.details_on_dblclick = true;

\tscheduler.config.drag_create = true;
\tscheduler.config.drag_event_body = false;
\tscheduler.config.drag_move = false;
\tscheduler.config.drag_resize = false;
\tscheduler.config.details_on_create=true;
\tscheduler.config.edit_on_create = true;
\t
\tscheduler.xy.scale_height = 50;
\t
\t
\tscheduler.config.all_timed = true;
\tscheduler.config.multi_day = true;

\t
\tscheduler.config.time_step = 1;

\tvar users\t\t= [ ";
        // line 274
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            echo "\t\t{ key: ";
            echo $this->getAttribute($context["opt"], "id", array());
            echo ", label: \"";
            echo $this->getAttribute($context["opt"], "name", array());
            echo "\" }, ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " ];
\tvar allusers\t= [ ";
        // line 275
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["allusers"]) ? $context["allusers"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            echo "\t{ key: ";
            echo $this->getAttribute($context["opt"], "id", array());
            echo ", label: \"";
            echo $this->getAttribute($context["opt"], "name", array());
            echo "\" }, ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " ];
\tvar sources\t\t= [ ";
        // line 276
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sources"]) ? $context["sources"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            echo "\t{ key: ";
            echo $this->getAttribute($context["opt"], "id", array());
            echo ", label: \"";
            echo $this->getAttribute($context["opt"], "name", array());
            echo "\" }, ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " ];
\tvar types\t\t= [ ";
        // line 277
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["opt"]) {
            echo "\t\t{ key: ";
            echo $this->getAttribute($context["opt"], "id", array());
            echo ", label: \"";
            echo $this->getAttribute($context["opt"], "name", array());
            echo "\" }, ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " ];

\tscheduler.templates.event_text=function(start, end, event){
\t\tif(typeof(event.type) !== 'undefined'){
\t\t\tif(event.type>types.length){event.type=0;}
\t\t\treturn types[event.type].label+\"<hr style='margin-top: 4px; margin-bottom: 4px;'>\"+event.text;
\t\t}
\t\treturn event.text;
\t}
\t
\t

\tscheduler.config.icons_select = [];
\tscheduler.attachEvent(\"onClick\", function(id){
\t\tvar event = scheduler.getEvent(id);
\t\tif(event.delta===\"00:00:00\"){
\t\t\tscheduler.config.icons_select = [];
\t\t}else{
\t\t\tscheduler.config.icons_select = [\"icon_details\"];
\t\t}
\t\treturn true;
\t});
\tscheduler.templates.event_class = function(start, end, event) {
\t\tif(event.delta===\"00:00:00\"){
\t\t\treturn \"my_event\";
\t\t}
\t};
\tscheduler.renderEvent = function(container, event) {
\t\tif(event.delta===\"00:00:00\"){
\t\t\tvar html = \"\"
\t\t\thtml += \"<div class='dhx_event_move my_event_move' style='width: \" + container.style.width + \"'></div>\";
\t\t\thtml += \"<div class='my_event_title'>\";
\t\t\thtml += \"\t<span class='event_date'>\"+scheduler.templates.event_date(event.start_date) + \"</span>\";
\t\t\thtml += \"</div>\";
\t\t\thtml += \"<div class='my_event_body'>\";
\t\t\thtml += \"\t<span>\" + types[event.type].label+\"</span>\";
\t\t\t//html += \"\t<span>\" + scheduler.templates.event_text(event.start_date,event.end_date,event)+\"</span>\";
\t\t\thtml += \"</div>\";
\t\t\thtml += \"<div class='dhx_event_resize my_event_resize' style='width: \" + container.style.width + \"'></div>\";
\t\t
\t\t\tcontainer.innerHTML = html;
\t\t\treturn true; //required, true - to display a custom form, false - the default form
\t\t}else{
\t\t\treturn false;
\t\t}
\t};
\t
\tscheduler.config.lightbox.sections = [
\t\t{ name: \"Time\",\t\t\tmap_to: \"auto\",\t\ttype: \"calendar_time\",\theight: 72,\t\t\t\t\t\t\t\t\t\t\t\t},
\t\t{ name: \"Length\",\t\tmap_to: \"delta\",\ttype: \"textarea\",\t\theight: 30,\t\t\t\t\t\t\t\t\t\t\t\t},
\t\t{ name: \"Type\",\t\t\tmap_to: \"type\",\t\ttype: \"select\",\t\t\theight: 30,\toptions:types,\t\tdefault_value:1\t\t\t},
\t\t{ name: \"Description\",\tmap_to: \"text\",\t\ttype: \"textarea\",\t\theight: 50,\tfocus: true \t\t\t\t\t\t\t\t},
\t\t{ name: \"User\",\t\t\tmap_to: \"user_id\",\ttype: \"select\",\t\t\theight: 30,\toptions: users,\t\tdefault_value:";
        // line 329
        echo (isset($context["myid"]) ? $context["myid"] : null);
        echo "\t},
\t\t{ name: \"Source\",\t\tmap_to: \"source\",\ttype: \"select\",\t\t\theight: 30,\toptions: sources,\tdefault_value:1\t\t\t},
\t\t{ name: \"Edited By\",\tmap_to: \"source_id\",type: \"select\",\t\t\theight: 30,\toptions: allusers,\tdefault_value:";
        // line 331
        echo (isset($context["myid"]) ? $context["myid"] : null);
        echo "\t},
\t];
\tscheduler.config.date_format =\t\"%Y-%m-%d %H:%i:%s\";
\tscheduler.config.day_date =\t\t\"%l %d/%m/%Y\";
\tscheduler.config.default_date =\t\"%d/%m/%Y\";
\t
\tscheduler.init(\"scheduler_here\", new Date(),\"week\");
\tscheduler.attachEvent(\"onLightbox\", function(id,isnew){
\t\tfor (i = 0; i < scheduler.formSection(\"User\").control.children.length; i++) {
\t\t\tscheduler.formSection(\"User\").control[i].selected=false;
\t\t} 
\t\tscheduler.formSection(\"User\").control.value = \$('#users').val();
\t\t
\t\tif(isnew){
\t\t\tscheduler.formSection(\"Type\").control.value = 0;
\t\t\tscheduler.formSection(\"Description\").control.value = \"\";
\t\t}
\t\t
\t\tscheduler.formSection(\"Type\").control.disabled = (isnew?false:true);
\t\tscheduler.formSection(\"User\").control.disabled = true;
\t\tscheduler.formSection(\"Description\").control.required = true;
\t\tscheduler.formSection(\"Length\").control.disabled = true;
\t\tscheduler.formSection(\"Source\").control.disabled = true;
\t\tscheduler.formSection(\"Edited By\").control.disabled = true;
\t});
\tscheduler.attachEvent(\"onEventSave\",function(id,ev,is_new){
\t\tif (!ev.text) {
\t\t\tdhtmlx.alert({
\t\t\t\ttitle:\"Required Field\",
\t\t\t\ttext:\"Description must not be empty\",
\t\t\t})
\t\t\treturn false;
\t\t}
\t\treturn true;
\t})
\t
\t
\treload();

\tvar dp = new dataProcessor(\"";
        // line 370
        echo (isset($context["ajax_Calendar"]) ? $context["ajax_Calendar"] : null);
        echo "\");
\tdp.init(scheduler);
\tdp.setTransactionMode(\"JSON\"); // use to transfer data with JSON
\tdp.attachEvent(\"onAfterUpdate\", function(id, action, tid, response){
\t\treload();
\t});
\t
\t\$( \"#users\" ).change(function(){reload();});

</script>
";
        // line 380
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "extension/module/clocking/calendar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  528 => 380,  515 => 370,  473 => 331,  468 => 329,  402 => 277,  387 => 276,  372 => 275,  357 => 274,  281 => 201,  252 => 175,  223 => 149,  117 => 45,  104 => 43,  100 => 42,  82 => 26,  71 => 24,  67 => 23,  58 => 17,  50 => 11,  39 => 9,  35 => 8,  28 => 6,  19 => 1,);
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
/* 				<div id="wksummary"></div>*/
/* 				<br>*/
/* 				<select id='users' class="form-control">*/
/* 					{% for opt in users %}*/
/* 						<option value="{{opt.id}}">{{opt.name}}</option>*/
/* 					{% endfor %}*/
/* 				</select>*/
/* 				<div id="scheduler_here" class="dhx_cal_container" style="width:100%; height:700px;">*/
/* 					<div class="dhx_cal_navline">*/
/* 						<div class="dhx_dummy dhx_cal_today_button" style='right:220px' onclick='scheduler.addEventNow()'>Add event</div>*/
/* 						<div class="dhx_cal_prev_button">&nbsp;</div>*/
/* 						<div class="dhx_cal_next_button">&nbsp;</div>*/
/* 						<div class="dhx_cal_today_button"></div>*/
/* 						<div class="dhx_cal_date"></div>*/
/* 						<div class="dhx_cal_tab" name="day_tab"></div>*/
/* 						<div class="dhx_cal_tab" name="week_tab"></div>*/
/* 						<div class="dhx_cal_tab" name="month_tab"></div>*/
/* 					</div>*/
/* 					<div class="dhx_cal_header"></div>*/
/* 					<div class="dhx_cal_data"></div>*/
/* 				</div>*/
/* 				<div id="legend">*/
/* 					{% for key in sources %}*/
/* 						<div style="background-color:{{key.color}};color:{{key.textColor}};">{{key.name}}</div>*/
/* 					{% endfor %}*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
/* <style type="text/css" >*/
/* 	html, body {*/
/* 		margin: 0;*/
/* 		padding: 0;*/
/* 	}*/
/* 	/* the background color for the whole container and its border*//* */
/* 	.my_event {*/
/* 		color:#FFFFFF;*/
/* 		background-color: #1796b0;*/
/* 		border: 1px solid #778899;*/
/* 		overflow: hidden;*/
/* 		*/
/* 		clip-path: */
/* 			polygon(*/
/* 				0% 0px,								/* top left *//* */
/* 				0px 0%,								/* top left *//* */
/* 				*/
/* 				calc(100% - 0px) 0%,				/* top right *//* */
/* 				100% 0px,							/* top right *//* */
/* 				*/
/* 				100% calc(100% - 100%),	/* bottom right *//* */
/* 				calc(100% - 50%) 100%,	/* bottom right *//* */
/* 				*/
/* 				50% 100%,				/* bottom left *//* */
/* 				0 calc(100% - 100%)		/* bottom left *//* */
/* 			);*/
/* 	}*/
/* 	*/
/* 	/* disabling the default color for the select menu *//* */
/* 	.dhx_cal_select_menu.my_event div {*/
/* 		border: 0;*/
/* 		background-color: transparent;*/
/* 		color: black;*/
/* 	}    */
/* 	/* styles for the event content *//* */
/* 	.dhx_cal_event.my_event .my_event_body {*/
/* 		padding-top: 3px;*/
/* 		padding-left: 5px;*/
/* 		text-align: center;*/
/* 	}   */
/* 	/* event's date information *//* */
/* 	.my_event .event_date {         */
/* 		font-weight: bold;*/
/* 		padding-right: 5px;*/
/* 	}   */
/* 	/* event's resizing section *//* */
/* 	.my_event_resize {*/
/* 		height: 3px;*/
/* 		position: absolute;*/
/* 		bottom: -1px;*/
/* 	}*/
/* 	/* event's move section *//* */
/* 	.my_event_move {*/
/* 		position: absolute;*/
/* 		top: 0;*/
/* 		height: 10px;*/
/* 		cursor: pointer;*/
/* 	}*/
/* 	.my_event_title {*/
/* 		height: 12px;*/
/* 		border-width: 1px 1px 0 1px;*/
/* 		border-bottom-style: dotted;*/
/* 		border-radius: 4px 4px 0 0;*/
/* 		font-size: 12px;*/
/* 		line-height: 12px;*/
/* 		font-weight: 700;*/
/* 		text-align: center;*/
/* 		background-position: right;*/
/* 		background-repeat: no-repeat;*/
/* 		padding: 1px 0 0 0;*/
/* 		cursor: pointer;*/
/* 	}*/
/* 	#legend{*/
/* 		text-align: center;*/
/* 	}*/
/* 	#legend div {*/
/* 		font-size: 20px;*/
/* 		line-height: 0px;*/
/* 		padding: 17px;*/
/* 		border-radius: 10px;*/
/* 		font-family: 'Times New Roman', Times, serif;*/
/* 		font-weight: normal;*/
/* 		text-decoration: none;*/
/* 		font-style: normal;*/
/* 		font-variant: normal;*/
/* 		text-transform: uppercase;*/
/* 		display: inline-block;*/
/* 		min-width:200px;*/
/* 		margin: 10px;*/
/* 		text-align: center;*/
/* 		white-space: nowrap;*/
/* 	}*/
/* */
/* </style>*/
/* <script>*/
/* 	var footer = null;*/
/* 	function reload(){*/
/* 		scheduler.clearAll();*/
/* 		var val = $('#users').val();*/
/* 		scheduler.load("{{ajax_Calendar}}&user_id="+val,function(){*/
/* */
/* 			var schedulerNode = document.querySelector("#scheduler_here");*/
/* 			var header = schedulerNode.querySelector(".dhx_cal_header");*/
/* 			*/
/* 			if((scheduler._mode === "week") || (scheduler._mode === "day")){*/
/* 				if(!footer){*/
/* 					footer = document.createElement("div");*/
/* 					footer.id = "scheduler_footer";*/
/* 					footer.style.position = "relative";*/
/* 					footer.style.bottom = "110px";*/
/* 					schedulerNode.parentNode.insertBefore(footer, schedulerNode.nextSibling);*/
/* 				}*/
/* */
/* 				var footerContent = header.cloneNode(true);*/
/* 				footerContent.style.borderBottom = "1px solid #CECECE";*/
/* 				footer.innerHTML = "";*/
/* 				footer.appendChild(footerContent);*/
/* 						*/
/* 				*/
/* 				$('#scheduler_footer div').children('div').each(function () {*/
/* 					var oldhtml = $(this).html();*/
/* 					var mydate = moment(oldhtml,'dddd DD/MM/YYYY').format('YYYY-MM-DD');*/
/* 					var me = $(this);*/
/* 					$.ajax({*/
/* 						dataType: "json",*/
/* 						url: "{{ajax_getcumulativeEventTime}}",*/
/* 						data: {"date": mydate ,"period": 'day' , "user_id" : $('#users').val()},*/
/* 						success: function (result) {*/
/* 							console.log(["processing day",oldhtml,mydate,result])*/
/* 							var str = "<table width='100%'>";*/
/* 							for (var key in result) {*/
/* 								str += "	<tr>";*/
/* 								str += "		<td style='text-align: right;'>"+result[key].name+"</td>";*/
/* 								str += "		<td>"+result[key].length+"</td>";*/
/* 								str += "		<td>";*/
/* 								if(result[key].running=='1'){*/
/* 									str += "		<img  src='view/image/timer.gif' style='height: 15px;'/>";*/
/* 								}*/
/* 								str += "		</td>";*/
/* 								str += "	</tr>";*/
/* 							};*/
/* 							str += "</table>";*/
/* 							me.html(str);*/
/* 						},*/
/* 					});*/
/* 				});*/
/* 				*/
/* 				if(scheduler._mode =="week"){*/
/* 					var mydate = moment(scheduler.getState().min_date).format('YYYY-MM-DD');*/
/* 					$.ajax({*/
/* 						dataType: "json",*/
/* 						url: "{{ajax_getcumulativeEventTime}}",*/
/* 						data: {"date": mydate ,"period": 'week' , "user_id" : $('#users').val()},*/
/* 						success: function (result) {*/
/* 							console.log(["processing wk",result])*/
/* 							*/
/* 							var str = "";*/
/* 							str += "<table class='table table-bordered'>";*/
/* 							str += "	<tr style='background: #f6f6f6;'>";*/
/* 							str += "	<th colspan=2>Week summary</th>";*/
/* 							str += "	</tr>";*/
/* 							for (var key in result) {*/
/* 								str += "	<tr>";*/
/* 								str += "		<th>"+result[key].name+"</th>";*/
/* 								str += "		<td>"+result[key].length+"&nbsp;";*/
/* 								if(result[key].running=='1'){*/
/* 									str += "		<img  src='view/image/timer.gif' style='height: 15px;'/>";*/
/* 								}*/
/* 								str += "		</td>";*/
/* 								str += "	</tr>";*/
/* 							};*/
/* 							str += "</table>";*/
/* 							$('#wksummary').html(str);*/
/* 						},*/
/* 					});*/
/* 				}else{*/
/* 					$('#wksummary').html("");*/
/* 				}*/
/* 			}*/
/* 			else{*/
/* 				if(footer){*/
/* 					$("#"+footer.id).remove();*/
/* 					footer = null;*/
/* 				}*/
/* 			}*/
/* 		});*/
/* 	};*/
/* */
/* 	scheduler.attachEvent("onViewChange",			function (new_mode , new_date)	{ reload(); });*/
/* 	scheduler.attachEvent("onAfterSchedulerResize",	function()						{ reload(); });*/
/* */
/* 	scheduler.setLoadMode("day");*/
/* 	scheduler.templates.hour_scale = function(date){*/
/* 		var format = scheduler.date.date_to_str("%H:%i");*/
/* 		var step = 60;*/
/* 		var html="";*/
/* 		for (var i=0; i<60/step; i++){*/
/* 			html+="<div style='height:11px;line-height:11px;'>"+format(date)+"</div>";*/
/* 			date = scheduler.date.add(date,step,"minute");*/
/* 		}*/
/* 		return html;*/
/* 	}*/
/* 	*/
/* 	scheduler.config.hour_size_px = 22;*/
/* 	scheduler.config.separate_short_events = true;*/
/* 	scheduler.config.show_loading = true;*/
/* 	scheduler.config.details_on_dblclick = true;*/
/* */
/* 	scheduler.config.drag_create = true;*/
/* 	scheduler.config.drag_event_body = false;*/
/* 	scheduler.config.drag_move = false;*/
/* 	scheduler.config.drag_resize = false;*/
/* 	scheduler.config.details_on_create=true;*/
/* 	scheduler.config.edit_on_create = true;*/
/* 	*/
/* 	scheduler.xy.scale_height = 50;*/
/* 	*/
/* 	*/
/* 	scheduler.config.all_timed = true;*/
/* 	scheduler.config.multi_day = true;*/
/* */
/* 	*/
/* 	scheduler.config.time_step = 1;*/
/* */
/* 	var users		= [ {% for opt in users %}		{ key: {{opt.id}}, label: "{{opt.name}}" }, {% endfor %} ];*/
/* 	var allusers	= [ {% for opt in allusers %}	{ key: {{opt.id}}, label: "{{opt.name}}" }, {% endfor %} ];*/
/* 	var sources		= [ {% for opt in sources %}	{ key: {{opt.id}}, label: "{{opt.name}}" }, {% endfor %} ];*/
/* 	var types		= [ {% for opt in types %}		{ key: {{opt.id}}, label: "{{opt.name}}" }, {% endfor %} ];*/
/* */
/* 	scheduler.templates.event_text=function(start, end, event){*/
/* 		if(typeof(event.type) !== 'undefined'){*/
/* 			if(event.type>types.length){event.type=0;}*/
/* 			return types[event.type].label+"<hr style='margin-top: 4px; margin-bottom: 4px;'>"+event.text;*/
/* 		}*/
/* 		return event.text;*/
/* 	}*/
/* 	*/
/* 	*/
/* */
/* 	scheduler.config.icons_select = [];*/
/* 	scheduler.attachEvent("onClick", function(id){*/
/* 		var event = scheduler.getEvent(id);*/
/* 		if(event.delta==="00:00:00"){*/
/* 			scheduler.config.icons_select = [];*/
/* 		}else{*/
/* 			scheduler.config.icons_select = ["icon_details"];*/
/* 		}*/
/* 		return true;*/
/* 	});*/
/* 	scheduler.templates.event_class = function(start, end, event) {*/
/* 		if(event.delta==="00:00:00"){*/
/* 			return "my_event";*/
/* 		}*/
/* 	};*/
/* 	scheduler.renderEvent = function(container, event) {*/
/* 		if(event.delta==="00:00:00"){*/
/* 			var html = ""*/
/* 			html += "<div class='dhx_event_move my_event_move' style='width: " + container.style.width + "'></div>";*/
/* 			html += "<div class='my_event_title'>";*/
/* 			html += "	<span class='event_date'>"+scheduler.templates.event_date(event.start_date) + "</span>";*/
/* 			html += "</div>";*/
/* 			html += "<div class='my_event_body'>";*/
/* 			html += "	<span>" + types[event.type].label+"</span>";*/
/* 			//html += "	<span>" + scheduler.templates.event_text(event.start_date,event.end_date,event)+"</span>";*/
/* 			html += "</div>";*/
/* 			html += "<div class='dhx_event_resize my_event_resize' style='width: " + container.style.width + "'></div>";*/
/* 		*/
/* 			container.innerHTML = html;*/
/* 			return true; //required, true - to display a custom form, false - the default form*/
/* 		}else{*/
/* 			return false;*/
/* 		}*/
/* 	};*/
/* 	*/
/* 	scheduler.config.lightbox.sections = [*/
/* 		{ name: "Time",			map_to: "auto",		type: "calendar_time",	height: 72,												},*/
/* 		{ name: "Length",		map_to: "delta",	type: "textarea",		height: 30,												},*/
/* 		{ name: "Type",			map_to: "type",		type: "select",			height: 30,	options:types,		default_value:1			},*/
/* 		{ name: "Description",	map_to: "text",		type: "textarea",		height: 50,	focus: true 								},*/
/* 		{ name: "User",			map_to: "user_id",	type: "select",			height: 30,	options: users,		default_value:{{myid}}	},*/
/* 		{ name: "Source",		map_to: "source",	type: "select",			height: 30,	options: sources,	default_value:1			},*/
/* 		{ name: "Edited By",	map_to: "source_id",type: "select",			height: 30,	options: allusers,	default_value:{{myid}}	},*/
/* 	];*/
/* 	scheduler.config.date_format =	"%Y-%m-%d %H:%i:%s";*/
/* 	scheduler.config.day_date =		"%l %d/%m/%Y";*/
/* 	scheduler.config.default_date =	"%d/%m/%Y";*/
/* 	*/
/* 	scheduler.init("scheduler_here", new Date(),"week");*/
/* 	scheduler.attachEvent("onLightbox", function(id,isnew){*/
/* 		for (i = 0; i < scheduler.formSection("User").control.children.length; i++) {*/
/* 			scheduler.formSection("User").control[i].selected=false;*/
/* 		} */
/* 		scheduler.formSection("User").control.value = $('#users').val();*/
/* 		*/
/* 		if(isnew){*/
/* 			scheduler.formSection("Type").control.value = 0;*/
/* 			scheduler.formSection("Description").control.value = "";*/
/* 		}*/
/* 		*/
/* 		scheduler.formSection("Type").control.disabled = (isnew?false:true);*/
/* 		scheduler.formSection("User").control.disabled = true;*/
/* 		scheduler.formSection("Description").control.required = true;*/
/* 		scheduler.formSection("Length").control.disabled = true;*/
/* 		scheduler.formSection("Source").control.disabled = true;*/
/* 		scheduler.formSection("Edited By").control.disabled = true;*/
/* 	});*/
/* 	scheduler.attachEvent("onEventSave",function(id,ev,is_new){*/
/* 		if (!ev.text) {*/
/* 			dhtmlx.alert({*/
/* 				title:"Required Field",*/
/* 				text:"Description must not be empty",*/
/* 			})*/
/* 			return false;*/
/* 		}*/
/* 		return true;*/
/* 	})*/
/* 	*/
/* 	*/
/* 	reload();*/
/* */
/* 	var dp = new dataProcessor("{{ajax_Calendar}}");*/
/* 	dp.init(scheduler);*/
/* 	dp.setTransactionMode("JSON"); // use to transfer data with JSON*/
/* 	dp.attachEvent("onAfterUpdate", function(id, action, tid, response){*/
/* 		reload();*/
/* 	});*/
/* 	*/
/* 	$( "#users" ).change(function(){reload();});*/
/* */
/* </script>*/
/* {{ footer }}*/
/* */
/* */
