!function(w){function d(e,t){return(typeof t)[0]==e}function u(a,s){return(s=function n(i,o,r,l,c,e){if(l=n.q,i!=d)return u(function(e,t){l.push({p:this,r:e,j:t,1:i,0:o})});if(r&&d(p,r)|d(m,r))try{c=r.then}catch(e){o=0,r=e}if(d(p,c)){function t(t){return function(e){return c&&(c=0,n(d,t,e))}}try{c.call(r,t(1),o=t(0))}catch(e){o(e)}}else for(s=function(n,e){return d(p,n=o?n:e)?u(function(e,t){f(this,e,t,r,n)}):a},e=0;e<l.length;)c=l[e++],d(p,i=c[o])?f(c.p,c.r,c.j,r,i):(o?c.r:c.j)(r)}).q=[],a.call(a={then:function(e,t){return s(e,t)},catch:function(e){return s(0,e)}},function(e){s(d,1,e)},function(e){s(d,0,e)}),a}function f(e,t,n,i,o){setTimeout(function(){try{o=(i=o(i))&&d(m,i)|d(p,i)&&i.then,d(p,o)?i==e?n(TypeError()):o.call(i,t,n):t(i)}catch(e){n(e)}},0)}function l(t){return u(function(e){e(t)})}var p,m;angular.module("widgetkit").service("mediaPicker",["$templateCache","$compile","$q","$rootScope","filterFilter","UIkit","mediaRequest","Application",function(t,n,i,o,e,r,s,d){var l,c,u,a,f,p,m=/\.(jpe?g|png|gif|svg|mp3|ogg|wav|mp4|wmv|ogv|webm)$/i,h=!1,g={init:function(e){return e&&e.allowedFiletypes&&(h=e.allowedFiletypes),this.options=angular.extend({multiple:!1},e),f=i.defer(),c=w(t.get("media")),u=c.data("media-path"),(a=n(c)(o).scope()).vm=this,a.selectItem=function(e,t){if(t.shiftKey&&p){window.getSelection?window.getSelection().empty?window.getSelection().empty():window.getSelection().removeAllRanges&&window.getSelection().removeAllRanges():document.selection&&document.selection.empty();for(var n,i=w(t.target).closest("li"),o=i.parent().children(),r=i.index()>p.index()?1:-1,l=1==r?p.index():i.index(),c=1==r?i.index():p.index(),a=l;a<=c;a++)(n=o.eq(a).scope())[n.folder?"folder":"file"].selected=!0}else e.selected=!e.selected;p=w(t.target).closest("li")},this.open("").then(function(){if(window.widgetkit.env.modal){var e=window.widgetkit.env.modal.element.children(":first").hide();g.close=function(){e.show(),c.remove()},e.parent().append(c)}else g.modal=r.modal(w('<div class="uk-modal">').append(c).appendTo("body")).show(),g.close=function(){g.modal.hide()},r.domObserve(g.modal.element);g.initUpload()}),f.promise},initUpload:function(){var t=w("#wk-upload-progressbar"),n=t.find(".uk-progress-bar"),e={param:"Filedata[]",params:{"Content-Type":"multipart/form-data"},allow:"*.(jpeg|jpg|gif|png|svg|mp3|ogg|wav|mp4|wmv|ogv|webm)",before:function(e,t){e.action=s.url({task:"file.upload",tmpl:"component",format:"html",folder:l},!0)},loadstart:function(){n.css("width","0%").text("0%"),t.removeClass("uk-hidden")},progress:function(e){e=Math.ceil(e)+"%",n.css("width",e).text(e)},allcomplete:function(e){n.css("width","100%").text("100%"),w(e).find(".alert-message").each(function(e,t){r.notify(w(t).text(),"danger")}),setTimeout(function(){t.addClass("uk-hidden")},250),g.open(l)}};r.uploadSelect(w("#wk-upload-select"),e),r.uploadDrop(c,e)},open:function(r){return s.get({view:"mediaList",tmpl:"component",folder:r,layout:"details"}).success(function(e){p=null,a.media=[],a.breadcrumbs=[];var t=w(e).find("tbody tr");".."==t.first().find(".description").text().trim()&&(t=t.not(t[0])),t.each(function(){var e=w(this),t=e.find("td:first a").length?e.find("td:first a"):e.find("td:nth-child(2) a"),n=e.find("td :checkbox").val(),i=e.find("td.dimensions").text().trim().split(" x "),o=(r?r+"/":"")+n;a.media.push({title:n,path:o,url:(u?u+"/":"")+o,href:d.baseUrl()+"/"+(u?u+"/":"")+o,type:t.is("[target]")?"folder":"file",media:Boolean(o.match(m)),width:i[0],height:i[1],size:e.find("td.filesize").text().trim()})});for(var n=((l=r)?"/"+l:"").split("/");a.breadcrumbs.unshift({path:n.join("/").substr(1),title:n.pop()}),n.length;);a.breadcrumbs[0].title="home"})},select:function(){function c(e){return e.replace(/[_-]/g," ").replace(/\.[^\.]+$/,"").replace(/\w\S*/g,function(e){return e.charAt(0).toUpperCase()+e.substr(1)})}var e=this.options,t=g.getSelected(),n=[],a=[];if(t.forEach(function(e){e.media||h&&e.path.match(h)?(e.title=c(e.title),a.push(e)):n.push(e)}),n.length){var i=[];n.forEach(function(l){var e=new Promise(function(n,e){s.get({view:"mediaList",tmpl:"component",folder:l.title,layout:"details"}).success(function(e){var t=w(e).find("tbody tr");".."==t.first().find(".description").text().trim()&&(t=t.not(t[0])),t.each(function(){var e=w(this),t=e.find("td:first a"),n=e.find("td :checkbox").val(),i=e.find("td.dimensions").text().trim().split(" x "),o=(l.title?l.title+"/":"")+n;if(o.match(m)){var r={title:c(n),path:o,url:(u?u+"/":"")+o,href:d.baseUrl()+"/"+(u?u+"/":"")+o,type:t.is("[target]")?"folder":"file",media:Boolean(o.match(m)),width:i[0],height:i[1],size:e.find("td.filesize").text().trim()};a.push(r)}}),n()})});i.push(e)}),Promise.all(i).then(function(){f.resolve(e.multiple||!a.length?a:a[0]),g.close()})}else f.resolve(this.options.multiple||!a.length?a:a[0]),g.close()},addFolder:function(){var e=prompt("Folder Name");e&&s.post({task:"folder.create",foldername:e,folderbase:l}).success(function(){g.open(l)})},remove:function(){window.confirm("Are you sure?")&&s.post({task:"folder.delete",folder:l,rm:g.getSelected().map(function(e){return e.title})}).success(function(){g.open(l)})},getSelected:function(){return e(a.media,{selected:!0})}};return{select:function(e){return g.init(e)}}}]).service("mediaRequest",["$q","$http","Application",function(e,t,n){var i="index.php?option=com_media";return{get:function(e){return t.get(this.url(e))},post:function(e){return e[n.config.token]=1,t.post(i,w.param(e),{headers:{"Content-Type":"application/x-www-form-urlencoded"}})},url:function(e,t){return t&&(e[n.config.token]=1),i+"&"+w.param(e)}}}]),window.Promise=window.Promise||(p="f",m="o",u.resolve=l,u.reject=function(n){return u(function(e,t){t(n)})},u.all=function(e){return u(function(n,i,o,r){r=[],o=e.length||n(r),e.map(function(e,t){l(e).then(function(e){r[t]=e,--o||n(r)},i)})})},u)}(jQuery);