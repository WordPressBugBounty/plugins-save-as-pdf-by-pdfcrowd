(function(b){function a(){const c=b(".save-as-pdf-pdfcrowd-editable-select");c.each(function(){const f=b(this);const e=f.find("select").first();const d=f.find(".save-as-pdf-pdfcrowd-ed-sel-input-wrap").first();const h=d.find("input").first();const g=h.val();let found=false;let custom_val="";e.find("option").each(function(){if(b(this).val()===g){found=true}if(b(this).data("custom")){custom_val=b(this).val()}});if(found){e.val(g)}else{e.val(custom_val);d.css("display","flex")}let prev_value=e.val();e.change(function(){if(prev_value!==e.val()){if(e.val()===custom_val){d.css("display","flex");h.val("").focus()}else{d.hide();h.val(e.val())}prev_value=e.val()}})})}b(function(){a();const j=b("#save-as-pdf-pdfcrowd-settings-cfg-area");if(!j.length){return}j.find("select.save-as-pdf-pdfcrowd-basic-input").css("min-width",j.find("select.save-as-pdf-pdfcrowd-adv-input").css("width"));const r=b("#save-as-pdf-pdfcrowd-admin-settings");const y=r.find("#save-as-pdf-pdfcrowd-settings-set");const s=y.find(".save-as-pdf-pdfcrowd-category-wrap");const d=r.find("#save-as-pdf-pdfcrowd-button-preview");const h=r.find("#save-as-pdf-pdfcrowd-options-filter");const u=r.find("#save-as-pdf-pdfcrowd-show-button-preview");const e=r.find(".save-as-pdf-pdfcrowd-dirty-flag");let initial_set=true;b("#save-as-pdf-pdfcrowd-converter_version").change(function(){if(b(this).val()==="24.04"){b(".save-as-pdf-pdfcrowd-deprecated").addClass("save-as-pdf-pdfcrowd-d-none")}else{b(".save-as-pdf-pdfcrowd-deprecated").removeClass("save-as-pdf-pdfcrowd-d-none")}});let expert_mode=false;let tabBoxes=b(".save-as-pdf-pdfcrowd-metaboxes");let currentTab=r.find(".nav-tab").first();const l="save-as-pdf-pdfcrowd-expert";const n="save-as-pdf-pdfcrowd-description";const k="save-as-pdf-pdfcrowd-preview";const o="save-as-pdf-pdfcrowd-shortcode";let preview_wanted=true;const i=b("#wpadminbar");let sticky_el=null;if(i.length&&i.css("position")==="fixed"){const p=b("body").css("background-color");const w=p!=="rgba(0, 0, 0, 0)"?p:"#f0f0f1";sticky_el=b("#save-as-pdf-pdfcrowd-sticky").first();sticky_el.css("position","sticky").css("z-index",1000).css("top",i[0].getBoundingClientRect().bottom).css("background-color",w)}b("#save-as-pdf-pdfcrowd-switch-wrap label").css("font-size",h.css("font-size"));function f(A,z){let timeoutId;return function(){const C=this;const B=arguments;clearTimeout(timeoutId);timeoutId=setTimeout(function(){A.apply(C,B)},z)}}function v(M){const E=j.find("#"+M+"clear-filter");const N=j.find("#"+M+"changes-only-toggle");function z(T){r.find("."+T).removeClass(T)}function S(T){z(M+"hidden-set");z(M+"input-hi");z(M+"must-visible");r.removeClass(M+"filter-applied")}function B(T){h.val("");E.hide();if(T){R(h)}}function A(){j.find("#save-as-pdf-pdfcrowd-filter-group select").val("")}function D(T,U){localStorage.setItem(T,U?"1":"0")}function G(V,X,U){const T=V.is(":checked");const W=r.find(X);if(T){W.show()}else{W.hide()}D(U,T);return T}u.change(function(){preview_wanted=G(b(this),"#"+M+"button-preview",k);if(preview_wanted&&window.SaveAsPDFPdfcrowdShowButtonPreview){window.SaveAsPDFPdfcrowdShowButtonPreview(this)}});r.find("#"+M+"sc-params").change(function(T){G(b(this),"."+M+"devi",o)});j.find("#"+M+"comments-toggle").change(function(){G(b(this),b("."+M+"description"),n)});r.find("#save-as-pdf-pdfcrowd-settings-toggle").click(function(){B(true);z(M+"must-visible");A();expert_mode=b(this).is(":checked");if(expert_mode){r.addClass(M+"expert-mode").removeClass(M+"basic-mode");const T=r.find("#"+M+"settings-set-nav").text("Expert Settings");if(!currentTab.is(":visible")){T.click()}}else{r.addClass(M+"basic-mode").removeClass(M+"expert-mode");r.find("#"+M+"settings-set-nav").text("Basic Settings")}D(l,expert_mode);L()});j.find("."+M+"categories-filter").change(function(){B();N.prop("checked","").change();S();const V=b(this).val();let first_el;if(V){s.addClass(M+"hidden-set");first_el=b("#"+V).removeClass(M+"hidden-set").get(0);b(this).addClass(M+"input-hi")}else{first_el=s.removeClass(M+"hidden-set").get(0)}if(sticky_el){const W=first_el.getBoundingClientRect().y;const T=b("html").first();const U=sticky_el[0].getBoundingClientRect().bottom;if(W<U){T.scrollTop(T.scrollTop()-(U-W+10))}}});function L(){r.removeClass(M+"no-changes");if(N.is(":checked")){B(true);O();r.addClass(M+"changes-only");let no_changes=true;r.find("."+M+"category-wrap").each(function(){const T=b(this);if(T.find("."+M+"set-group").is(":visible")){T.find("> ."+M+"heading-wrap").addClass(M+"must-visible");no_changes=false}});if(no_changes){r.addClass(M+"no-changes")}}else{r.removeClass(M+"changes-only")}}N.change(function(){L()});function J(T){if(T){r.find("#save-as-pdf-pdfcrowd-settings-toggle").click()}}function O(){r.find("."+M+"categories-filter").prop("selectedIndex",0);s.removeClass(M+"hidden-set")}function R(V){S();O();r.removeClass(M+"no-filter-res");const U=V.val();const W=U.trim();if(W.length){if(N.is(":checked")){N.click()}r.addClass(M+"filter-applied");V.addClass(M+"input-hi");E.show();const T=new RegExp(W.replaceAll(" ","\\s*"),"im");let count=0;y.find("."+M+"set-group > th").each(function(){const X=b(this);if(T.test(X.text())){X.parent().removeClass(M+"not-filtered");if(X.is(":visible")){count++;X.closest("."+M+"category-wrap").find("> ."+M+"heading-wrap").addClass(M+"must-visible")}}else{X.parent().addClass(M+"not-filtered")}});if(!count){r.addClass(M+"no-filter-res")}}else{E.hide();y.find("."+M+"set-group").removeClass(M+"not-filtered")}}const P=f(R,100);h.on("input",function(){P(b(this))});E.click(function(){B(true)});let prev_values=null;function I(V){if(prev_values){const W=V.attr("type");const U=V.attr("name");const T=prev_values.get(U);let value;if(W=="checkbox"){value=V.is(":checked")?"1":null}else{value=V.val()}if(W=="radio"){r.find('input[name="'+U+'"]').removeClass(M+"is-changed")}if(T!=value){V.addClass(M+"is-changed");e.show()}else{V.removeClass(M+"is-changed");if(!r.find("."+M+"is-changed").length){e.hide()}}}}function F(V){if(V.hasClass("wp-picker-default")){return}let is_default=false;const U=V.closest("."+M+"set-group");const X=V.attr("type");I(V);if(X!="radio"||V.is(":checked")){if(X==="radio"){U.find(":input").removeClass(M+"not-default-set")}const W=decodeURIComponent(U.data("default"));let value="";const T=V.data("parent-opt");let parent_opt=T?b(T):null;if(parent_opt&&!parent_opt.is(":checked")){return}if(X=="checkbox"){if(V.is(":checked")){value="1"}}else{value=V.val();if(!value&&!V.data("empty-is-not-def")&&X!="radio"){value=W}}if(value==W){V.removeClass(M+"not-default-set");if(!U.find("."+M+"not-default-set").length){U.removeClass(M+"not-default-set")}}else{V.addClass(M+"not-default-set");U.addClass(M+"not-default-set")}if(parent_opt&&parent_opt.is(":input")){F(parent_opt)}if(!initial_set){L()}}}b("."+M+"color-field").wpColorPicker({change:function(T,U){b(this).val(U.color.toString());F(b(this));window.SaveAsPDFPdfcrowdShowButtonPreview(this)}});y.find(":input").change(function(){F(b(this))}).change();const Q=f(F,200);y.find('input[type="text"], textarea').on("input",function(){Q(b(this))});b("#"+M+"license-settings :input").change(function(){F(b(this))});prev_values=new FormData(b("#save-as-pdf-pdfcrowd-options")[0]);function K(U,T){const V=j.find(T);if(localStorage.getItem(U)==="1"){V.click()}else{V.change()}}function H(T){if(localStorage.getItem(T)===null){D(T,true)}}r.find("[data-parent-opt]").focus(function(){const T=b(b(this).data("parent-opt"));if(!T.prop("checked")){T.prop("checked",true)}});const C=new URLSearchParams(window.location.search);J(localStorage.getItem(l)==="1"||C.get("expert")==="1");H(n);H(k);K(n,"#"+M+"comments-toggle");K(k,"#"+M+"show-button-preview");K(o,"#"+M+"sc-params")}r.find("#save-as-pdf-pdfcrowd-nav-tab").on("click","a",function(A){A.preventDefault();const z=b(this).attr("href");b(".nav-tab").removeClass("nav-tab-active");tabBoxes.addClass("hidden");currentTab=b(z).toggleClass("hidden");b(this).addClass("nav-tab-active");if(history.pushState){history.pushState(null,null,z)}else{location.hash=z}if(z=="#save-as-pdf-pdfcrowd-settings-set"){j.show();if(preview_wanted){d.show()}}else{j.hide();d.hide()}});r.find("#save-as-pdf-pdfcrowd-close-preview").click(function(){u.click()});v("save-as-pdf-pdfcrowd-");if(window.location.hash&&window.location.hash.startsWith("#save-as-pdf-pdfcrowd")){const m=b('a.nav-tab[href="'+window.location.hash+'"]');if(m.length===1){m.click()}else{let elem=b(window.location.hash);if(elem.hasClass("save-as-pdf-pdfcrowd-category-wrap")){elem=elem.find(".save-as-pdf-pdfcrowd-heading-wrap")}if(elem.length){if(!elem.is(":visible")&&!expert_mode){r.find("#save-as-pdf-pdfcrowd-settings-toggle").click()}elem[0].scrollIntoView()}}}window.SaveAsPDFPdfcrowd=function(A,C,z,B){if(!z.indicator||window.pdfcrowdConversionInProgress){return}setTimeout(function(){window.pdfcrowdConversionInProgress=false;window.SaveAsPDFPdfcrowdIndicators.functionFromName(z.indicator)(false,B)},4000);window.SaveAsPDFPdfcrowdIndicators.functionFromName(z.indicator)(true,B);console.log("conversion request");window.pdfcrowdConversionInProgress=true};window.SaveAsPDFPdfcrowdShowButtonPreview=function(C){if(C.name=="save-as-pdf-pdfcrowd[button_styling]"){if(C.value=="theme"){b("#save-as-pdf-pdfcrowd-custom-button").hide();u.prop("disabled",true);if(!initial_set){u.prop("checked",false).change()}return}else{b("#save-as-pdf-pdfcrowd-custom-button").show();u.prop("disabled",false);if(!initial_set){u.prop("checked",true).change()}}}if(!preview_wanted){return}function z(D){return D.replace(/[&<"']/g,function(E){return{"&":"&amp;","<":"&lt;",'"':"&quot;","'":"&#39;"}[E]})}function A(){var E=b("#save-as-pdf-pdfcrowd-appearance :input").serializeArray();var D={};b.map(E,function(H,F){const G=/button_(custom|indicator)_html/.test(H.name)?H.value:z(H.value);D[H.name.match(/\[(.*)\]/)[1]]=G});return D}var B=A();b.ajax({type:"post",url:ajaxurl,data:{action:"save_as_pdf_pdfcrowd_create_button",style:B,nonce:b("#save-as-pdf-pdfcrowd-options").data("nonce")},success:function(D){b("#save-as-pdf-pdfcrowd-button-preview-content").html(D);window.SaveAsPDFPdfcrowdIndicators.init()},error:function(D){if(D.status){alert("Error "+D.status+" - "+D.statusText)}}})};b("#save-as-pdf-pdfcrowd-contact-submit").click(function(){alert("Ajax POST to our site");b("#TB_overlay").click()});var g=b("input[name='save-as-pdf-pdfcrowd[button_styling]']:checked");if(g.length){window.SaveAsPDFPdfcrowdShowButtonPreview(g[0])}const q=f(window.SaveAsPDFPdfcrowdShowButtonPreview,200);b("#save-as-pdf-pdfcrowd-appearance :input").change(function(){q(this)});b('#save-as-pdf-pdfcrowd-appearance input[type="text"], #save-as-pdf-pdfcrowd-appearance textarea').on("input",function(){q(this)});b(".save-as-pdf-pdfcrowd-text-for-radio").click(function(){b(this).prevAll(":radio").prop("checked",true);return false});function t(z){if(z==="email"){b(".save-as-pdf-pdfcrowd-email-details").addClass("save-as-pdf-pdfcrowd-show-email")}else{b(".save-as-pdf-pdfcrowd-email-details").removeClass("save-as-pdf-pdfcrowd-show-email")}}b('input:radio[name="save-as-pdf-pdfcrowd[button_disposition]"]').change(function(){t(b(this).val())});t(b('input:radio[name="save-as-pdf-pdfcrowd[button_disposition]"]:checked').val());function x(A){var z=b("#save-as-pdf-pdfcrowd-cm-content-options input:checkbox");if(A!="content"){z.prop("checked",false).change();z.prop("disabled",true)}else{z.prop("disabled",false).change()}}b('input:radio[name="save-as-pdf-pdfcrowd[conversion_mode]"]').change(function(){x(b(this).val())});x(b('input:radio[name="save-as-pdf-pdfcrowd[conversion_mode]"]:checked').val());function c(z){if(z=="regular"){b("#save-as-pdf-pdfcrowd-lic-cred").show()}else{b("#save-as-pdf-pdfcrowd-lic-cred").hide()}}b('input:radio[name="save-as-pdf-pdfcrowd[license_type]"]').change(function(){c(b(this).val())});c(b('input:radio[name="save-as-pdf-pdfcrowd[license_type]"]:checked').val());b("#save-as-pdf-pdfcrowd-use-predefined-h-html").click(function(){b("#save-as-pdf-pdfcrowd-header_html").val(b("#save-as-pdf-pdfcrowd-hidden-header").val()).change()});b("#save-as-pdf-pdfcrowd-use-predefined-f-html").click(function(){b("#save-as-pdf-pdfcrowd-footer_html").val(b("#save-as-pdf-pdfcrowd-hidden-footer").val()).change()});if(b("#save-as-pdf-pdfcrowd-wizard")){b("#save-as-pdf-pdfcrowd-wizard-done").click(function(){let mode;switch(b('input:radio[name="save-as-pdf-pdfcrowd-wizard-cm"]:checked').val()){case"canvas":mode="#save-as-pdf-pdfcrowd-conversion-mode-content";b("#save-as-pdf-pdfcrowd-button-user-drawings").prop("disabled",false).prop("checked",true).change();break;case"data":mode="#save-as-pdf-pdfcrowd-conversion-mode-content";b("#save-as-pdf-pdfcrowd-button-user-drawings").prop("disabled",false).prop("checked",false).change();break;case"pp":case"private":mode="#save-as-pdf-pdfcrowd-conversion-mode-upload";break;default:mode="#save-as-pdf-pdfcrowd-conversion-mode-url"}b(mode).prop("checked",true).change();b("#pdfcrowd-save").click()});b("#save-as-pdf-pdfcrowd-wizard-next").click(function(){let step=b(this).data("step");b("#save-as-pdf-pdfcrowd-wizard-step-"+step).hide();step++;if(step==3){b("#save-as-pdf-pdfcrowd-wizard-next").hide()}b("#save-as-pdf-pdfcrowd-wizard-step-"+step).show();b(this).data("step",step)});b("#save-as-pdf-pdfcrowd-page_size").appendTo("#save-as-pdf-pdfcrowd-wizard-page_size");b("#save-as-pdf-pdfcrowd-orientation").appendTo("#save-as-pdf-pdfcrowd-wizard-orientation");b("#save-as-pdf-pdfcrowd-no_margins").appendTo("#save-as-pdf-pdfcrowd-wizard-no_margins");b("#save-as-pdf-pdfcrowd-button-text").appendTo("#save-as-pdf-pdfcrowd-wizard-button-text");b("#save-as-pdf-pdfcrowd-public").appendTo("#save-as-pdf-pdfcrowd-wizard-public");b("#save-as-pdf-pdfcrowd-private").appendTo("#save-as-pdf-pdfcrowd-wizard-private");b("#save-as-pdf-pdfcrowd-pp").appendTo("#save-as-pdf-pdfcrowd-wizard-pp");b("#save-as-pdf-pdfcrowd-data").appendTo("#save-as-pdf-pdfcrowd-wizard-data");b("#save-as-pdf-pdfcrowd-canvas").appendTo("#save-as-pdf-pdfcrowd-wizard-canvas");b("#save-as-pdf-pdfcrowd-wizard-step-1").show()}b("#save-as-pdf-pdfcrowd-pg-link").click(function(A){A.preventDefault();let api_params="";const z=/\[(.*?)\]/;b("#save-as-pdf-pdfcrowd-api-settings :input").each(function(){const C=b(this);const D=C.attr("type");let value="";if(D==="checkbox"){if(C.is(":checked")){value="true"}}else{if(D!=="radio"||C.is(":checked")){value=C.val()}}if(value){let name=C.attr("name");const B=name.match(z);if(B){name=B[1]}if(name!=="converter_version"||value!=="20.10"){api_params+="&"+name+"="+encodeURIComponent(value)}}});window.open(b(this).attr("href")+api_params,"_blank")});b("#save-as-pdf-pdfcrowd-do-upgrade").click(function(){let el_conv_version=b("#save-as-pdf-pdfcrowd-converter_version");if(el_conv_version.val()!=="24.04"){el_conv_version.val("24.04")}switch(b("#save-as-pdf-pdfcrowd-rendering_mode").val()){case"default":b("#save-as-pdf-pdfcrowd-content_viewport_width").val("balanced");break;case"viewport":b("#save-as-pdf-pdfcrowd-content_viewport_width").val(b("#save-as-pdf-pdfcrowd-viewport_width").val()||"1024");break}const B=b("#save-as-pdf-pdfcrowd-viewport_height").val();b("#save-as-pdf-pdfcrowd-content_viewport_height").val(B=="15000"?"large":(B||"768"));const z={"default":"smart-scaling",disabled:"no-scaling","viewport-fit":"viewport-width","content-fit":"content-width","single-page-fit":"single-page","single-page-fit-ex":"single-page-ratio",mode1:"no-scaling"};const A=b("#save-as-pdf-pdfcrowd-smart_scaling_mode").val();if(A){b("#save-as-pdf-pdfcrowd-content_fit_mode").val(z[A]||"auto")}b("#pdfcrowd-save").click()});initial_set=false})})(jQuery);