/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
import DocumentService from"@typo3/core/document-service.js";import $ from"jquery";import FormEngineValidation from"@typo3/backend/form-engine-validation.js";import Icons from"@typo3/backend/icons.js";import{default as Modal}from"@typo3/backend/modal.js";import*as MessageUtility from"@typo3/backend/utility/message-utility.js";import Severity from"@typo3/backend/severity.js";import*as BackendExceptionModule from"@typo3/backend/backend-exception.js";import InteractionRequestMap from"@typo3/backend/event/interaction-request-map.js";import Utility from"@typo3/backend/utility.js";import{selector}from"@typo3/core/literals.js";export default(function(){function e(e,t){t?n.interactionRequestMap.resolveFor(e):n.interactionRequestMap.rejectFor(e)}const t=new Map;t.set("typo3-backend-form-update-value",(e=>{const t=document.querySelector(selector`[name="${e.elementName}"]`),n=document.querySelector(selector`[data-formengine-input-name="${e.elementName}"]`);FormEngineValidation.updateInputField(e.elementName),null!==t&&(FormEngineValidation.markFieldAsChanged(t),FormEngineValidation.validateField(t)),null!==n&&n!==t&&FormEngineValidation.validateField(n)})),t.set("typo3-backend-form-reload",(e=>{if(!e.confirmation)return void n.saveDocument();const t=Modal.advanced({title:TYPO3.lang["FormEngine.refreshRequiredTitle"],content:TYPO3.lang["FormEngine.refreshRequiredContent"],severity:Severity.warning,staticBackdrop:!0,buttons:[{text:TYPO3.lang["button.cancel"]||"Cancel",active:!0,btnClass:"btn-default",name:"cancel"},{text:TYPO3.lang["button.ok"]||"OK",btnClass:"btn-"+Severity.getCssClass(Severity.warning),name:"ok",trigger:()=>{n.saveDocument()}}]});t.addEventListener("button.clicked",(()=>t.hideModal()))})),t.set("typo3-backend-form-update-bitmask",((e,t)=>{const a=t.target,o=n.formElement[e.elementName],i=a.checked!==e.invert,r=Math.pow(2,e.position),l=Math.pow(2,e.total)-r-1;o.value=i?o.value|r:o.value&l,o.dispatchEvent(new Event("change",{bubbles:!0,cancelable:!0}))}));const n={consumeTypes:["typo3.setUrl","typo3.beforeSetUrl","typo3.refresh"],Validation:FormEngineValidation,interactionRequestMap:InteractionRequestMap,formName:TYPO3.settings.FormEngine.formName,formElement:void 0,openedPopupWindow:null,legacyFieldChangedCb:function(){$.isFunction(TYPO3.settings.FormEngine.legacyFieldChangedCb)&&TYPO3.settings.FormEngine.legacyFieldChangedCb()},browserUrl:""};if(Object.defineProperty(n,"formElement",{get:()=>document.forms.namedItem(n.formName),enumerable:!0,configurable:!1}),n.openPopupWindow=function(e,t,a){const o={mode:e,bparams:t};return a&&("db"===e?o.expandPage=a:o.expandFolder=a),Modal.advanced({type:Modal.types.iframe,content:n.browserUrl+"&"+new URLSearchParams(o).toString(),size:Modal.sizes.large})},n.setSelectOptionFromExternalSource=function(e,t,a,o,i,r){i=String(i);let l,c,s=!1,d=!1;c=n.getFieldElement(e),l=c.get(0);const u=c.get(0);if(null===u||"--div--"===t||u instanceof HTMLOptGroupElement)return;const m=n.getFieldElement(e,"_list",!0);if(m.length>0&&(c=m,l=c.get(0),s=c.prop("multiple")&&"1"!=c.prop("size"),d=!0),s||d){const d=n.getFieldElement(e,"_avail");if(!s){for(const e of l.querySelectorAll("option")){const t=d.find(selector`option[value="${$(e).attr("value")}"]`);t.length&&(t.removeClass("hidden").prop("disabled",!1),n.enableOptGroup(t.get(0)))}c.empty()}if(i){let e=!1,a=new RegExp("(^|,)"+t+"($|,)");i.match(a)?(c.empty(),e=!0):1==c.find("option").length&&(a=new RegExp("(^|,)"+c.find("option").prop("value")+"($|,)"),i.match(a)&&(c.empty(),e=!0)),e&&void 0!==r&&r.closest("select").querySelectorAll("[disabled]").forEach((function(e){e.classList.remove("hidden"),e.disabled=!1,n.enableOptGroup(e)}))}let m=!0;const f=n.getFieldElement(e,"_mul",!0);if(0==f.length||0==f.val()){for(const e of l.querySelectorAll("option"))if(e.value==t){m=!1;break}if(m&&void 0!==r){r.classList.add("hidden"),r.disabled=!0;const e=r.parentElement;e instanceof HTMLOptGroupElement&&0===e.querySelectorAll("option:not([disabled]):not([hidden]):not(.hidden)").length&&(e.disabled=!0,e.classList.add("hidden"))}}if(m){const e=$("<option></option>");e.attr({value:t,title:o}).text(a),e.appendTo(c),n.updateHiddenFieldValueFromSelect(l,u),n.legacyFieldChangedCb(),FormEngineValidation.markFieldAsChanged(u),n.Validation.validateField(c),n.Validation.validateField(d)}}else{const e=/_(\d+)$/,a=t.toString().match(e);null!=a&&(t=a[1]),c.val(t),n.Validation.validateField(c)}},n.updateHiddenFieldValueFromSelect=function(e,t){const n=Array.from(e.options).map((e=>e.value));t.value=n.join(","),t.dispatchEvent(new Event("change",{bubbles:!0,cancelable:!0}))},n.getFormElement=function(e){const t=$(selector`form[name="${n.formName}"]:first`);if(!e)return t;{const a=n.getFieldElement(e),o=n.getFieldElement(e,"_list");if(a.length>0&&("select-one"===a.prop("type")||o.length>0&&o.prop("type").match(/select-(one|multiple)/)))return t;console.error("Form fields missing: form: "+n.formName+", field name: "+e),alert("Form field is invalid")}},n.getFieldElement=function(e,t,a){const o=$(selector`form[name="${n.formName}"]:first`);if(t){let n;switch(t){case"_list":n=$(selector`:input[data-formengine-input-name="${e}"]:not([type=hidden])`,o);break;case"_avail":n=$(selector`:input[data-relatedfieldname="${e}"]`,o);break;case"_mul":case"_hr":n=$(selector`:input[type=hidden][data-formengine-input-name="${e}"]`,o);break;default:n=null}if(n&&n.length>0||!0===a)return n}return $(selector`:input[name="${e}"]`,o)},n.initializeEvents=function(){top.TYPO3&&void 0!==top.TYPO3.Backend&&(top.TYPO3.Backend.consumerScope.attach(n),window.addEventListener("pagehide",(()=>top.TYPO3.Backend.consumerScope.detach(n)),{once:!0})),$(document).on("click",".t3js-editform-close",(e=>{e.preventDefault(),n.preventExitIfNotSaved(n.preventExitIfNotSavedCallback)})).on("click",".t3js-editform-view",(e=>{e.preventDefault(),n.previewAction(e,n.previewActionCallback)})).on("click",".t3js-editform-new",(e=>{e.preventDefault(),n.newAction(e,n.newActionCallback)})).on("click",".t3js-editform-duplicate",(e=>{e.preventDefault(),n.duplicateAction(e,n.duplicateActionCallback)})).on("click",".t3js-editform-delete-record",(e=>{e.preventDefault(),n.deleteAction(e,n.deleteActionCallback)})).on("click",".t3js-editform-submitButton",(e=>{const t=$(e.currentTarget),n=t.data("name")||e.currentTarget.name,a=$("<input />").attr("type","hidden").attr("name",n).attr("value","1");t.parents("form").append(a)})).on("change",'.t3-form-field-eval-null-checkbox input[type="checkbox"]',(e=>{$(e.currentTarget).closest(".t3js-formengine-field-item").toggleClass("disabled")})).on("change",'.t3js-form-field-eval-null-placeholder-checkbox input[type="checkbox"]',(e=>{n.toggleCheckboxField($(e.currentTarget)),FormEngineValidation.markFieldAsChanged($(e.currentTarget))})).on("change",(()=>{$(".module-docheader-bar .btn").removeClass("disabled").prop("disabled",!1)})).on("click",".t3js-element-browser",(function(e){e.preventDefault(),e.stopPropagation();const t=$(e.currentTarget),a=t.data("mode"),o=t.data("params"),i=t.data("entryPoint");n.openPopupWindow(a,o,i)})).on("click",'[data-formengine-field-change-event="click"]',(e=>{const t=JSON.parse(e.currentTarget.dataset.formengineFieldChangeItems);n.processOnFieldChange(t,e)})).on("change",'[data-formengine-field-change-event="change"]',(e=>{const t=JSON.parse(e.currentTarget.dataset.formengineFieldChangeItems);n.processOnFieldChange(t,e)})),n.formElement.addEventListener("submit",(function(e){if(e.target.closeDoc.value)return;const t=["button[form]",'button[name^="_save"]','a[data-name^="_save"]','button[name="CMD"][value^="save"]','a[data-name="CMD"][data-value^="save"]'].join(","),n=document.querySelector(t);null!==n&&(n.disabled=!0,Icons.getIcon("spinner-circle",Icons.sizes.small).then((function(e){n.querySelector(".t3js-icon").outerHTML=e})))})),window.addEventListener("message",n.handlePostMessage)},n.consume=function(t){if(!t)throw new BackendExceptionModule.BackendException("No interaction request given",1496589980);const a=$.Deferred();if(t.concernsTypes(n.consumeTypes)){const o=t.outerMostRequest;n.interactionRequestMap.attachFor(o,a),o.isProcessed()?e(o,o.getProcessedData().response):n.hasChange()?n.preventExitIfNotSaved((function(t){o.setProcessedData({response:t}),e(o,t)})):n.interactionRequestMap.resolveFor(o)}return a},n.handlePostMessage=function(e){if(!MessageUtility.MessageUtility.verifyOrigin(e.origin))throw"Denied message sent by "+e.origin;if("typo3:elementBrowser:elementAdded"===e.data.actionName){if(void 0===e.data.fieldName)throw"fieldName not defined in message";if(void 0===e.data.value)throw"value not defined in message";const t=e.data.label||e.data.value,a=e.data.title||t,o=e.data.exclusiveValues||"";n.setSelectOptionFromExternalSource(e.data.fieldName,e.data.value,t,a,o)}},n.initializeRemainingCharacterViews=function(){const e=$("[maxlength]").not('[data-input-type="datetimepicker"]').not(".t3js-color-picker").not(".t3js-charcounter-initialized");e.on("focus",(e=>{const t=$(e.currentTarget),a=t.parents(".t3js-formengine-field-item:first"),o=n.getCharacterCounterProperties(t);let i=a.find(".t3js-charcounter-wrapper");i.length||(i=$("<div>"),i.addClass("t3js-charcounter-wrapper"),a.append(i)),i.append($("<div />",{class:"t3js-charcounter"}).append($("<span />",{class:o.labelClass}).text(TYPO3.lang["FormEngine.remainingCharacters"].replace("{0}",o.remainingCharacters))))})).on("blur",(e=>{$(e.currentTarget).parents(".t3js-formengine-field-item:first").find(".t3js-charcounter").remove()})).on("keyup",(e=>{const t=$(e.currentTarget),a=t.parents(".t3js-formengine-field-item:first"),o=n.getCharacterCounterProperties(t);a.find(".t3js-charcounter span").removeClass().addClass(o.labelClass).text(TYPO3.lang["FormEngine.remainingCharacters"].replace("{0}",o.remainingCharacters))})),e.addClass("t3js-charcounter-initialized")},n.getCharacterCounterProperties=function(e){const t=e.val(),n=parseInt(e.attr("maxlength"),10)-t.length-(t.match(/\n/g)||[]).length;let a="";return a=n<15?"badge-danger":n<30?"badge-warning":"badge-info",{remainingCharacters:n,labelClass:"badge "+a}},n.initializeMinimumCharactersLeftViews=function(){const e=(e,t)=>{const n=t.currentTarget.closest(".t3js-formengine-field-item"),a=n.querySelector(".t3js-charcounter-min"),o=TYPO3.lang["FormEngine.minCharactersLeft"].replace("{0}",e);if(a)a.querySelector("span").innerHTML=o;else{const e=document.createElement("div");e.classList.add("t3js-charcounter-min");const t=document.createElement("span");t.classList.add("badge","badge-danger"),t.innerHTML=o,e.append(t);let a=n.querySelector(".t3js-charcounter-wrapper");a||(a=document.createElement("div"),a.classList.add("t3js-charcounter-wrapper"),n.append(a)),a.prepend(e)}},t=e=>{const t=e.currentTarget.closest(".t3js-formengine-field-item").querySelector(".t3js-charcounter-min");t&&t.remove()};document.querySelectorAll('[minlength]:not([data-input-type="datetimepicker"]):not(.t3js-charcounter-min-initialized)').forEach((a=>{a.addEventListener("focus",(t=>{const o=n.getMinCharacterLeftCount(a);o>0&&e(o,t)})),a.addEventListener("blur",t),a.addEventListener("keyup",(o=>{const i=n.getMinCharacterLeftCount(a);i>0?e(i,o):t(o)}))}))},n.getMinCharacterLeftCount=function(e){const t=e.value,n=e.minLength,a=t.length;if(0===a)return 0;return n-a-(t.match(/\n/g)||[]).length},n.initializeNullNoPlaceholderCheckboxes=function(){document.querySelectorAll(".t3-form-field-eval-null-checkbox").forEach((e=>{const t=e.querySelector('input[type="checkbox"]'),n=e.closest(".t3js-formengine-field-item");t.checked||n.classList.add("disabled")}))},n.initializeNullWithPlaceholderCheckboxes=function(){document.querySelectorAll(".t3js-form-field-eval-null-placeholder-checkbox").forEach((e=>{n.toggleCheckboxField($(e).find('input[type="checkbox"]'),!1)}))},n.toggleCheckboxField=function(e,t=!0){const n=e.closest(".t3js-formengine-field-item");e.prop("checked")?(n.find(".t3js-formengine-placeholder-placeholder").hide(),n.find(".t3js-formengine-placeholder-formfield").show(),t&&n.find(".t3js-formengine-placeholder-formfield").find(":input").trigger("focus")):(n.find(".t3js-formengine-placeholder-placeholder").show(),n.find(".t3js-formengine-placeholder-formfield").hide())},n.reinitialize=function(){const e=document.querySelectorAll(".t3js-clearable");e.length>0&&import("@typo3/backend/input/clearable.js").then((function(){e.forEach((e=>e.clearable()))})),n.initializeNullNoPlaceholderCheckboxes(),n.initializeNullWithPlaceholderCheckboxes(),n.initializeLocalizationStateSelector(),n.initializeMinimumCharactersLeftViews(),n.initializeRemainingCharacterViews()},n.initializeLocalizationStateSelector=function(){document.querySelectorAll(".t3js-l10n-state-container").forEach((e=>{const t=e.closest(".t3js-formengine-field-item")?.querySelector("[data-formengine-input-name]");if(null==t)return;const n=e.querySelector('input[type="radio"]:checked')?.value;void 0===n&&console.warn("The localization state of the field "+t.dataset.formengineInputName+" cannot be determined. This smells like a DataHandler bug."),"parent"!==n&&"source"!==n||(t.disabled=!0)}))},n.hasChange=function(){const e=$(selector`form[name="${n.formName}"] .has-change`).length>0,t=$('[name^="data["].has-change').length>0;return e||t},n.preventExitIfNotSavedCallback=()=>{n.closeDocument()},n.preventFollowLinkIfNotSaved=function(e){return n.preventExitIfNotSaved((function(){window.location.href=e})),!1},n.preventExitIfNotSaved=function(e){if(e=e||n.preventExitIfNotSavedCallback,n.hasChange()){const t=TYPO3.lang["label.confirm.close_without_save.title"]||"Do you want to close without saving?",a=TYPO3.lang["label.confirm.close_without_save.content"]||"You currently have unsaved changes. Are you sure you want to discard these changes?",o=$("<input />").attr("type","hidden").attr("name","_saveandclosedok").attr("value","1"),i=[{text:TYPO3.lang["buttons.confirm.close_without_save.no"]||"No, I will continue editing",btnClass:"btn-default",name:"no"},{text:TYPO3.lang["buttons.confirm.close_without_save.yes"]||"Yes, discard my changes",btnClass:"btn-default",name:"yes"}];0===$(".has-error").length&&i.push({text:TYPO3.lang["buttons.confirm.save_and_close"]||"Save and close",btnClass:"btn-primary",name:"save",active:!0});const r=Modal.confirm(t,a,Severity.warning,i);r.addEventListener("button.clicked",(function(t){"no"===t.target.name?r.hideModal():"yes"===t.target.name?(r.hideModal(),e.call(null,!0)):"save"===t.target.name&&($(selector`form[name="${n.formName}"]`).append(o),r.hideModal(),n.saveDocument())}))}else e.call(null,!0)},n.preventSaveIfHasErrors=function(){if($(".has-error").length>0){const e=TYPO3.lang["label.alert.save_with_error.title"]||"You have errors in your form!",t=TYPO3.lang["label.alert.save_with_error.content"]||"Please check the form, there is at least one error in your form.",n=Modal.confirm(e,t,Severity.error,[{text:TYPO3.lang["buttons.alert.save_with_error.ok"]||"OK",btnClass:"btn-danger",name:"ok"}]);return n.addEventListener("button.clicked",(function(e){"ok"===e.target.name&&n.hideModal()})),!1}return!0},n.requestFormEngineUpdate=function(e){if(e){const e=Modal.advanced({title:TYPO3.lang["FormEngine.refreshRequiredTitle"],content:TYPO3.lang["FormEngine.refreshRequiredContent"],severity:Severity.warning,staticBackdrop:!0,buttons:[{text:TYPO3.lang["button.cancel"]||"Cancel",active:!0,btnClass:"btn-default",name:"cancel",trigger:()=>{e.hideModal()}},{text:TYPO3.lang["button.ok"]||"OK",btnClass:"btn-"+Severity.getCssClass(Severity.warning),name:"ok",trigger:()=>{n.closeModalsRecursive(),n.saveDocument()}}]})}else n.saveDocument()},n.processOnFieldChange=function(e,n){e.forEach((e=>{const a=t.get(e.name);a instanceof Function&&a.call(null,e.data||null,n)}))},n.registerOnFieldChangeHandler=function(e,n){t.has(e)&&console.warn("Handler for onFieldChange name `"+e+"` has been overridden."),t.set(e,n)},n.closeModalsRecursive=function(){void 0!==Modal.currentModal&&null!==Modal.currentModal&&(Modal.currentModal.addEventListener("typo3-modal-hidden",(function(){n.closeModalsRecursive()})),Modal.currentModal.hideModal())},n.previewAction=function(e,t){t=t||n.previewActionCallback;const a=e.currentTarget.href,o="isNew"in e.target.dataset,i=$("<input />").attr("type","hidden").attr("name","_savedokview").attr("value","1");n.hasChange()?n.showPreviewModal(a,o,i,t):($(selector`form[name="${n.formName}"]`).append(i),window.open("","newTYPO3frontendWindow"),n.formElement.submit())},n.previewActionCallback=function(e,t,a){switch(Modal.dismiss(),e){case"discard":const e=window.open(t,"newTYPO3frontendWindow");e.focus(),Utility.urlsPointToSameServerSideResource(e.location.href,t)&&e.location.reload();break;case"save":$(selector`form[name="${n.formName}"]`).append($(a)),window.open("","newTYPO3frontendWindow"),n.saveDocument()}},n.showPreviewModal=function(e,t,n,a){const o=TYPO3.lang["label.confirm.view_record_changed.title"]||"Do you want to save before viewing?",i={text:TYPO3.lang["buttons.confirm.view_record_changed.cancel"]||"Cancel",btnClass:"btn-default",name:"cancel"},r={text:TYPO3.lang["buttons.confirm.view_record_changed.no-save"]||"View without changes",btnClass:"btn-default",name:"discard"},l={text:TYPO3.lang["buttons.confirm.view_record_changed.save"]||"Save changes and view",btnClass:"btn-primary",name:"save",active:!0};let c=[],s="";t?(c=[i,l],s=TYPO3.lang["label.confirm.view_record_changed.content.is-new-page"]||"You need to save your changes before viewing the page. Do you want to save and view them now?"):(c=[i,r,l],s=TYPO3.lang["label.confirm.view_record_changed.content"]||"You currently have unsaved changes. You can either discard these changes or save and view them.");const d=Modal.confirm(o,s,Severity.info,c);d.addEventListener("button.clicked",(function(t){a(t.target.name,e,n,d)}))},n.newAction=function(e,t){t=t||n.newActionCallback;const a=$("<input />").attr("type","hidden").attr("name","_savedoknew").attr("value","1"),o="isNew"in e.target.dataset;n.hasChange()?n.showNewModal(o,a,t):($(selector`form[name="${n.formName}"]`).append(a),n.formElement.submit())},n.newActionCallback=function(e,t){const a=$(selector`form[name="${n.formName}"]`);switch(Modal.dismiss(),e){case"no":a.append(t),n.formElement.submit();break;case"yes":a.append(t),n.saveDocument()}},n.showNewModal=function(e,t,n){const a=TYPO3.lang["label.confirm.new_record_changed.title"]||"Do you want to save before adding?",o=TYPO3.lang["label.confirm.new_record_changed.content"]||"You need to save your changes before creating a new record. Do you want to save and create now?";let i=[];const r={text:TYPO3.lang["buttons.confirm.new_record_changed.cancel"]||"Cancel",btnClass:"btn-default",name:"cancel"},l={text:TYPO3.lang["buttons.confirm.new_record_changed.no"]||"No, just add",btnClass:"btn-default",name:"no"},c={text:TYPO3.lang["buttons.confirm.new_record_changed.yes"]||"Yes, save and create now",btnClass:"btn-primary",name:"yes",active:!0};i=e?[r,c]:[r,l,c];Modal.confirm(a,o,Severity.info,i).addEventListener("button.clicked",(function(e){n(e.target.name,t)}))},n.duplicateAction=function(e,t){t=t||n.duplicateActionCallback;const a=$("<input />").attr("type","hidden").attr("name","_duplicatedoc").attr("value","1"),o="isNew"in e.target.dataset;n.hasChange()?n.showDuplicateModal(o,a,t):($(selector`form[name="${n.formName}"]`).append(a),n.formElement.submit())},n.duplicateActionCallback=function(e,t){const a=$(selector`form[name="${n.formName}"]`);switch(Modal.dismiss(),e){case"no":a.append(t),n.formElement.submit();break;case"yes":a.append(t),n.saveDocument()}},n.showDuplicateModal=function(e,t,n){const a=TYPO3.lang["label.confirm.duplicate_record_changed.title"]||"Do you want to save before duplicating this record?",o=TYPO3.lang["label.confirm.duplicate_record_changed.content"]||"You currently have unsaved changes. Do you want to save your changes before duplicating this record?";let i=[];const r={text:TYPO3.lang["buttons.confirm.duplicate_record_changed.cancel"]||"Cancel",btnClass:"btn-default",name:"cancel"},l={text:TYPO3.lang["buttons.confirm.duplicate_record_changed.no"]||"No, just duplicate the original",btnClass:"btn-default",name:"no"},c={text:TYPO3.lang["buttons.confirm.duplicate_record_changed.yes"]||"Yes, save and duplicate this record",btnClass:"btn-primary",name:"yes",active:!0};i=e?[r,c]:[r,l,c];Modal.confirm(a,o,Severity.info,i).addEventListener("button.clicked",(function(e){n(e.target.name,t)}))},n.deleteAction=function(e,t){t=t||n.deleteActionCallback;const a=$(e.target);n.showDeleteModal(a,t)},n.deleteActionCallback=function(e,t){Modal.dismiss(),"yes"===e&&n.invokeRecordDeletion(t)},n.showDeleteModal=function(e,t){const n=TYPO3.lang["label.confirm.delete_record.title"]||"Delete this record?";let a=(TYPO3.lang["label.confirm.delete_record.content"]||"Are you sure you want to delete the record '%s'?").replace("%s",e.data("record-info"));e.data("reference-count-message")&&(a+="\n"+e.data("reference-count-message")),e.data("translation-count-message")&&(a+="\n"+e.data("translation-count-message"));Modal.confirm(n,a,Severity.warning,[{text:TYPO3.lang["buttons.confirm.delete_record.no"]||"Cancel",btnClass:"btn-default",name:"no"},{text:TYPO3.lang["buttons.confirm.delete_record.yes"]||"Yes, delete this record",btnClass:"btn-warning",name:"yes",active:!0}]).addEventListener("button.clicked",(function(n){t(n.target.name,e)}))},n.enableOptGroup=function(e){const t=e.parentElement;t instanceof HTMLOptGroupElement&&t.querySelectorAll("option:not([hidden]):not([disabled]):not(.hidden)").length&&(t.hidden=!1,t.disabled=!1,t.classList.remove("hidden"))},n.closeDocument=function(){n.formElement.closeDoc.value=1,n.dispatchSubmitEvent(),n.formElement.submit()},n.saveDocument=function(){n.formElement.doSave.value=1,n.dispatchSubmitEvent(),n.formElement.submit()},n.dispatchSubmitEvent=function(){const e=document.createEvent("Event");e.initEvent("submit",!1,!0),n.formElement.dispatchEvent(e)},n.initialize=function(e){n.browserUrl=e,DocumentService.ready().then((()=>{n.initializeEvents(),n.Validation.initialize(),n.reinitialize(),$("#t3js-ui-block").remove()}))},n.invokeRecordDeletion=function(e){window.location.href=e.attr("href")},void 0!==TYPO3.settings.RequireJS&&void 0!==TYPO3.settings.RequireJS.PostInitializationModules["TYPO3/CMS/Backend/FormEngine"])for(const e of TYPO3.settings.RequireJS.PostInitializationModules["TYPO3/CMS/Backend/FormEngine"])window.require([e]);return TYPO3.FormEngine=n,n}());