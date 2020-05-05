!function(u){"use strict";var e;function g(t,e,i){this.extend(g,google.maps.OverlayView),this.map_=t,this.markers_=[],this.clusters_=[],this.sizes=[53,56,66,78,90],this.styles_=[],this.ready_=!1;var s=i||{};this.gridSize_=s.gridSize||60,this.minClusterSize_=s.minimumClusterSize||2,this.maxZoom_=s.maxZoom||null,this.styles_=s.styles||[],this.imagePath_=s.imagePath||this.MARKER_CLUSTER_IMAGE_PATH_,this.imageExtension_=s.imageExtension||this.MARKER_CLUSTER_IMAGE_EXTENSION_,this.zoomOnClick_=!0,null!=s.zoomOnClick&&(this.zoomOnClick_=s.zoomOnClick),this.averageCenter_=!1,null!=s.averageCenter&&(this.averageCenter_=s.averageCenter),this.setupStyles_(),this.setMap(t),this.prevZoom_=this.map_.getZoom();var r=this;google.maps.event.addListener(this.map_,"zoom_changed",function(){var t=r.map_.getZoom();r.prevZoom_!=t&&(r.prevZoom_=t,r.resetViewport())}),google.maps.event.addListener(this.map_,"idle",function(){r.redraw()}),e&&e.length&&this.addMarkers(e,!1)}function a(t){this.markerClusterer_=t,this.map_=t.getMap(),this.gridSize_=t.getGridSize(),this.minClusterSize_=t.getMinClusterSize(),this.averageCenter_=t.isAverageCenter(),this.center_=null,this.markers_=[],this.bounds_=null,this.clusterIcon_=new s(this,t.getStyles(),t.getGridSize())}function s(t,e,i){t.getMarkerClusterer().extend(s,google.maps.OverlayView),this.styles_=e,this.padding_=i||0,this.cluster_=t,this.center_=null,this.map_=t.getMap(),this.div_=null,this.sums_=null,this.visible_=!1,this.setMap(this.map_)}u(function(){u('script[type="widgetkit/map"]').each(function(){var t=u(this),p=u("<div data-uk-check-display data-wk-check-display></div>").attr(t.data()),l=JSON.parse(this.innerHTML);t.replaceWith(p),e||(e=u.Deferred(),window.wkInitializeGoogleMapsApi=e.resolve,u.getScript("//maps.google.com/maps/api/js?callback=wkInitializeGoogleMapsApi&key="+(window.GOOGLE_MAPS_API_KEY||""))),e.promise().then(function(){var r,t,e,o,i,s=l.markers,n=[],a=window.MapsMarkerHelper||!1;Object.keys(l).forEach(function(t){isNaN(l[t])||(l[t]=Number(l[t]))}),e=s.length?new google.maps.LatLng(s[0].lat,s[0].lng):new google.maps.LatLng(-34.397,150.644),t={zoom:parseInt(l.zoom,10),center:e,streetViewControl:l.mapctrl,navigationControl:l.mapctrl,scrollwheel:l.zoomwheel,draggable:l.draggable,mapTypeId:google.maps.MapTypeId[l.maptypeid.toUpperCase()],mapTypeControl:l.maptypecontrol,zoomControl:l.zoomcontrol,disableDefaultUI:l.disabledefaultui,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU,mapTypeIds:["styled_map",google.maps.MapTypeId.ROADMAP,google.maps.MapTypeId.SATELLITE]},zoomControlOptions:{style:l.mapctrl?google.maps.ZoomControlStyle.DEFAULT:google.maps.ZoomControlStyle.SMALL}},r=new google.maps.Map(p[0],t),p.data("googlemap",r).on("display.uk.check",function(){google.maps.event.trigger(r,"resize")}),s.length&&l.directions&&(o=u('<a target="_blank"></a>').css({padding:"5px 1px","text-decoration":"none"}),(i=u("<div></div>").css({"-webkit-background-clip":"padding-box",padding:"1px 4px",backgroundColor:"white",borderColor:"rgba(0, 0, 0, 0.14902)",borderStyle:"solid",borderWidth:"1px",cursor:"pointer",textAlign:"center",fontFamily:"Roboto, Arial, sans-serif",fontWeight:500,boxShadow:"rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px",index:1})).html('<span style="color:#000;"><span style="color:blue;">&#8627;</span>'+(l.directionsText||"Get Directions")+"</span>"),o.append(i),o.setHref=function(t,e){this.attr("href","http://maps.google.com/?daddr="+t+","+e)},r.controls[google.maps.ControlPosition.TOP_RIGHT].push(o[0])),s.length&&l.marker&&(s.forEach(function(t,e){var i,s=new google.maps.Marker({position:new google.maps.LatLng(t.lat,t.lng),map:r,title:t.title});(a&&t.icon||l.marker_icon)&&a.setIcon(s,t.icon||l.marker_icon),n.push(s),1<=l.marker&&(i=new google.maps.InfoWindow({content:t.content,maxWidth:l.popup_max_width?parseInt(l.popup_max_width,10):300}),google.maps.event.addListener(s,"click",function(){2<=l.marker&&t.content&&i.open(r,s),o&&(o.setHref(t.lat,t.lng),o.show())}),0===e&&(3===l.marker&&t.content&&i.open(r,s),o&&(o.setHref(t.lat,t.lng),o.show())))}),r.panTo(new google.maps.LatLng(s[0].lat,s[0].lng))),l.markercluster&&(this.markerCluster=new g(r,n));var h=new google.maps.StyledMapType([{featureType:"all",elementType:"all",stylers:[{invert_lightness:l.styler_invert_lightness},{hue:l.styler_hue},{saturation:l.styler_saturation},{lightness:l.styler_lightness},{gamma:l.styler_gamma}]}],{name:"Styled"});r.mapTypes.set("styled_map",h),"ROADMAP"==l.maptypeid.toUpperCase()&&r.setMapTypeId("styled_map")})})}),g.prototype.MARKER_CLUSTER_IMAGE_PATH_="https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m",g.prototype.MARKER_CLUSTER_IMAGE_EXTENSION_="png",g.prototype.extend=function(t,e){return function(t){for(var e in t.prototype)this.prototype[e]=t.prototype[e];return this}.apply(t,[e])},g.prototype.onAdd=function(){this.setReady_(!0)},g.prototype.draw=function(){},g.prototype.setupStyles_=function(){if(!this.styles_.length)for(var t,e=0;t=this.sizes[e];e++)this.styles_.push({url:this.imagePath_+(e+1)+"."+this.imageExtension_,height:t,width:t})},g.prototype.fitMapToMarkers=function(){for(var t,e=this.getMarkers(),i=new google.maps.LatLngBounds,s=0;t=e[s];s++)i.extend(t.getPosition());this.map_.fitBounds(i)},g.prototype.setStyles=function(t){this.styles_=t},g.prototype.getStyles=function(){return this.styles_},g.prototype.isZoomOnClick=function(){return this.zoomOnClick_},g.prototype.isAverageCenter=function(){return this.averageCenter_},g.prototype.getMarkers=function(){return this.markers_},g.prototype.getTotalMarkers=function(){return this.markers_.length},g.prototype.setMaxZoom=function(t){this.maxZoom_=t},g.prototype.getMaxZoom=function(){return this.maxZoom_},g.prototype.calculator_=function(t,e){for(var i=0,s=t.length,r=s;0!==r;)r=parseInt(r/10,10),i++;return{text:s,index:i=Math.min(i,e)}},g.prototype.setCalculator=function(t){this.calculator_=t},g.prototype.getCalculator=function(){return this.calculator_},g.prototype.addMarkers=function(t,e){for(var i,s=0;i=t[s];s++)this.pushMarkerTo_(i);e||this.redraw()},g.prototype.pushMarkerTo_=function(t){if(t.isAdded=!1,t.draggable){var e=this;google.maps.event.addListener(t,"dragend",function(){t.isAdded=!1,e.repaint()})}this.markers_.push(t)},g.prototype.addMarker=function(t,e){this.pushMarkerTo_(t),e||this.redraw()},g.prototype.removeMarker_=function(t){var e=-1;if(this.markers_.indexOf)e=this.markers_.indexOf(t);else for(var i,s=0;i=this.markers_[s];s++)if(i==t){e=s;break}return-1!=e&&(t.setMap(null),this.markers_.splice(e,1),!0)},g.prototype.removeMarker=function(t,e){var i=this.removeMarker_(t);return!(e||!i)&&(this.resetViewport(),this.redraw(),!0)},g.prototype.removeMarkers=function(t,e){for(var i,s=!1,r=0;i=t[r];r++){var o=this.removeMarker_(i);s=s||o}if(!e&&s)return this.resetViewport(),this.redraw(),!0},g.prototype.setReady_=function(t){this.ready_||(this.ready_=t,this.createClusters_())},g.prototype.getTotalClusters=function(){return this.clusters_.length},g.prototype.getMap=function(){return this.map_},g.prototype.setMap=function(t){this.map_=t},g.prototype.getGridSize=function(){return this.gridSize_},g.prototype.setGridSize=function(t){this.gridSize_=t},g.prototype.getMinClusterSize=function(){return this.minClusterSize_},g.prototype.setMinClusterSize=function(t){this.minClusterSize_=t},g.prototype.getExtendedBounds=function(t){var e=this.getProjection(),i=new google.maps.LatLng(t.getNorthEast().lat(),t.getNorthEast().lng()),s=new google.maps.LatLng(t.getSouthWest().lat(),t.getSouthWest().lng()),r=e.fromLatLngToDivPixel(i);r.x+=this.gridSize_,r.y-=this.gridSize_;var o=e.fromLatLngToDivPixel(s);o.x-=this.gridSize_,o.y+=this.gridSize_;var n=e.fromDivPixelToLatLng(r),a=e.fromDivPixelToLatLng(o);return t.extend(n),t.extend(a),t},g.prototype.isMarkerInBounds_=function(t,e){return e.contains(t.getPosition())},g.prototype.clearMarkers=function(){this.resetViewport(!0),this.markers_=[]},g.prototype.resetViewport=function(t){for(var e,i=0;e=this.clusters_[i];i++)e.remove();var s;for(i=0;s=this.markers_[i];i++)s.isAdded=!1,t&&s.setMap(null);this.clusters_=[]},g.prototype.repaint=function(){var i=this.clusters_.slice();this.clusters_.length=0,this.resetViewport(),this.redraw(),window.setTimeout(function(){for(var t,e=0;t=i[e];e++)t.remove()},0)},g.prototype.redraw=function(){this.createClusters_()},g.prototype.distanceBetweenPoints_=function(t,e){if(!t||!e)return 0;var i=(e.lat()-t.lat())*Math.PI/180,s=(e.lng()-t.lng())*Math.PI/180,r=Math.sin(i/2)*Math.sin(i/2)+Math.cos(t.lat()*Math.PI/180)*Math.cos(e.lat()*Math.PI/180)*Math.sin(s/2)*Math.sin(s/2);return 6371*(2*Math.atan2(Math.sqrt(r),Math.sqrt(1-r)))},g.prototype.addToClosestCluster_=function(t){for(var e,i=4e4,s=null,r=(t.getPosition(),0);e=this.clusters_[r];r++){var o=e.getCenter();if(o){var n=this.distanceBetweenPoints_(o,t.getPosition());n<i&&(i=n,s=e)}}s&&s.isMarkerInClusterBounds(t)?s.addMarker(t):((e=new a(this)).addMarker(t),this.clusters_.push(e))},g.prototype.createClusters_=function(){if(this.ready_)for(var t,e=new google.maps.LatLngBounds(this.map_.getBounds().getSouthWest(),this.map_.getBounds().getNorthEast()),i=this.getExtendedBounds(e),s=0;t=this.markers_[s];s++)!t.isAdded&&this.isMarkerInBounds_(t,i)&&this.addToClosestCluster_(t)},a.prototype.isMarkerAlreadyAdded=function(t){if(this.markers_.indexOf)return-1!=this.markers_.indexOf(t);for(var e,i=0;e=this.markers_[i];i++)if(e==t)return!0;return!1},a.prototype.addMarker=function(t){if(this.isMarkerAlreadyAdded(t))return!1;if(this.center_){if(this.averageCenter_){var e=this.markers_.length+1,i=(this.center_.lat()*(e-1)+t.getPosition().lat())/e,s=(this.center_.lng()*(e-1)+t.getPosition().lng())/e;this.center_=new google.maps.LatLng(i,s),this.calculateBounds_()}}else this.center_=t.getPosition(),this.calculateBounds_();t.isAdded=!0,this.markers_.push(t);var r=this.markers_.length;if(r<this.minClusterSize_&&t.getMap()!=this.map_&&t.setMap(this.map_),r==this.minClusterSize_)for(var o=0;o<r;o++)this.markers_[o].setMap(null);return r>=this.minClusterSize_&&t.setMap(null),this.updateIcon(),!0},a.prototype.getMarkerClusterer=function(){return this.markerClusterer_},a.prototype.getBounds=function(){for(var t,e=new google.maps.LatLngBounds(this.center_,this.center_),i=this.getMarkers(),s=0;t=i[s];s++)e.extend(t.getPosition());return e},a.prototype.remove=function(){this.clusterIcon_.remove(),this.markers_.length=0,delete this.markers_},a.prototype.getSize=function(){return this.markers_.length},a.prototype.getMarkers=function(){return this.markers_},a.prototype.getCenter=function(){return this.center_},a.prototype.calculateBounds_=function(){var t=new google.maps.LatLngBounds(this.center_,this.center_);this.bounds_=this.markerClusterer_.getExtendedBounds(t)},a.prototype.isMarkerInClusterBounds=function(t){return this.bounds_.contains(t.getPosition())},a.prototype.getMap=function(){return this.map_},a.prototype.updateIcon=function(){var t=this.map_.getZoom(),e=this.markerClusterer_.getMaxZoom();if(e&&e<t)for(var i,s=0;i=this.markers_[s];s++)i.setMap(this.map_);else if(this.markers_.length<this.minClusterSize_)this.clusterIcon_.hide();else{var r=this.markerClusterer_.getStyles().length,o=this.markerClusterer_.getCalculator()(this.markers_,r);this.clusterIcon_.setCenter(this.center_),this.clusterIcon_.setSums(o),this.clusterIcon_.show()}},s.prototype.triggerClusterClick=function(){var t=this.cluster_.getMarkerClusterer();google.maps.event.trigger(t,"clusterclick",this.cluster_),t.isZoomOnClick()&&this.map_.fitBounds(this.cluster_.getBounds())},s.prototype.onAdd=function(){if(this.div_=document.createElement("DIV"),this.visible_){var t=this.getPosFromLatLng_(this.center_);this.div_.style.cssText=this.createCss(t),this.div_.innerHTML=this.sums_.text}this.getPanes().overlayMouseTarget.appendChild(this.div_);var e=this;google.maps.event.addDomListener(this.div_,"click",function(){e.triggerClusterClick()})},s.prototype.getPosFromLatLng_=function(t){var e=this.getProjection().fromLatLngToDivPixel(t);return e.x-=parseInt(this.width_/2,10),e.y-=parseInt(this.height_/2,10),e},s.prototype.draw=function(){if(this.visible_){var t=this.getPosFromLatLng_(this.center_);this.div_.style.top=t.y+"px",this.div_.style.left=t.x+"px"}},s.prototype.hide=function(){this.div_&&(this.div_.style.display="none"),this.visible_=!1},s.prototype.show=function(){if(this.div_){var t=this.getPosFromLatLng_(this.center_);this.div_.style.cssText=this.createCss(t),this.div_.style.display=""}this.visible_=!0},s.prototype.remove=function(){this.setMap(null)},s.prototype.onRemove=function(){this.div_&&this.div_.parentNode&&(this.hide(),this.div_.parentNode.removeChild(this.div_),this.div_=null)},s.prototype.setSums=function(t){this.sums_=t,this.text_=t.text,this.index_=t.index,this.div_&&(this.div_.innerHTML=t.text),this.useStyle()},s.prototype.useStyle=function(){var t=Math.max(0,this.sums_.index-1);t=Math.min(this.styles_.length-1,t);var e=this.styles_[t];this.url_=e.url,this.height_=e.height,this.width_=e.width,this.textColor_=e.textColor,this.anchor_=e.anchor,this.textSize_=e.textSize,this.backgroundPosition_=e.backgroundPosition},s.prototype.setCenter=function(t){this.center_=t},s.prototype.createCss=function(t){var e=[];e.push("background-image:url("+this.url_+");");var i=this.backgroundPosition_?this.backgroundPosition_:"0 0";e.push("background-position:"+i+";"),"object"==typeof this.anchor_?("number"==typeof this.anchor_[0]&&0<this.anchor_[0]&&this.anchor_[0]<this.height_?e.push("height:"+(this.height_-this.anchor_[0])+"px; padding-top:"+this.anchor_[0]+"px;"):e.push("height:"+this.height_+"px; line-height:"+this.height_+"px;"),"number"==typeof this.anchor_[1]&&0<this.anchor_[1]&&this.anchor_[1]<this.width_?e.push("width:"+(this.width_-this.anchor_[1])+"px; padding-left:"+this.anchor_[1]+"px;"):e.push("width:"+this.width_+"px; text-align:center;")):e.push("height:"+this.height_+"px; line-height:"+this.height_+"px; width:"+this.width_+"px; text-align:center;");var s=this.textColor_?this.textColor_:"black",r=this.textSize_?this.textSize_:11;return e.push("cursor:pointer; top:"+t.y+"px; left:"+t.x+"px; color:"+s+"; position:absolute; font-size:"+r+"px; font-family:Arial,sans-serif; font-weight:bold"),e.join("")}}(jQuery);