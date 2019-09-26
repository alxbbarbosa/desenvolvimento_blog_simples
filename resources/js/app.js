require('./bootstrap');

window.Vue = require('vue');

import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(FlashMessage);

import VeeValidate from 'vee-validate'
Vue.use(VeeValidate)

/*
Vue.component('comments-manager', require('./components/comments/CommentsManager.vue').default)
Vue.component('<commen></commen>t-list', require('./components/comments/CommentList.vue').default)
Vue.component('form-comment', require('./components/comments/FormComment.vue').default)*/
Vue.component('world-map', require('./pages/World.vue').default)
import VueTagsInput from '@johmun/vue-tags-input';
import TagInputComponent from './components/articles/TagInputComponent.vue'

import ActivityGraph from './components/Graph/ActivityGraph.vue'
Vue.component('activity-graph', ActivityGraph);

import Editor from '@tinymce/tinymce-vue'
import 'tinymce'
// Theme
import 'tinymce/themes/silver/theme'

// Skins
import 'tinymce/skins/ui/oxide/skin.min.css'
import 'tinymce/skins/ui/oxide/content.min.css'
import 'tinymce/skins/content/default/content.min.css'

// Plugins
import 'tinymce/plugins/fullscreen'
import 'tinymce/plugins/paste'
import 'tinymce/plugins/autoresize'
import 'tinymce/plugins/advlist'
import 'tinymce/plugins/autolink'
import 'tinymce/plugins/lists'
import 'tinymce/plugins/link'
import 'tinymce/plugins/image'
import 'tinymce/plugins/charmap'
import 'tinymce/plugins/print'
import 'tinymce/plugins/preview'
import 'tinymce/plugins/hr'
import 'tinymce/plugins/anchor'
import 'tinymce/plugins/pagebreak'
import 'tinymce/plugins/searchreplace'
import 'tinymce/plugins/wordcount'
import 'tinymce/plugins/visualblocks'
import 'tinymce/plugins/visualchars'
import 'tinymce/plugins/code'
import 'tinymce/plugins/insertdatetime'
import 'tinymce/plugins/media'
import 'tinymce/plugins/nonbreaking'
import 'tinymce/plugins/save'
import 'tinymce/plugins/table'
import 'tinymce/plugins/contextmenu'
import 'tinymce/plugins/directionality'
import 'tinymce/plugins/emoticons'
import 'tinymce/plugins/template'
import 'tinymce/plugins/paste'
import 'tinymce/plugins/textcolor'
import 'tinymce/plugins/colorpicker'
import 'tinymce/plugins/textpattern'
//import 'tinymce/plugins/emojis'
//import 'tinymce/plugins/moxiemanager'
import 'tinymce/langs/pt_BR'

tinyMCE.init({
    path_absolute: "{{ url('/') }}/",
    selector: ".tinymce",
    theme: "silver",
    language: "pt_BR",
    min_height: 400,
    /*menubar: false,*/
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "template paste textcolor colorpicker textpattern tinydrive"
    ],
    /*skin_url: '/tinymce/skins/lightgray',*/
    /*branding: false,*/
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_picker_types: 'file image media',
    file_picker_callback: function (field_name, url, type) {

        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = this.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        console.log('Passou aqui ', cmsURL)
        /*

        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizable: "yes",
            close_previous: "no"
        });*/
    }
});

const app = new Vue({
    el: '.wrapper',
    data() {
        return {
            body: "",
            tag: '',
            tags: [],
            tagsStored: []
        }
    },
    components: {
        'editor': Editor,
        VueTagsInput,
        TagInputComponent,
    },
    watch: {
        tags: function (val, old) {
            let element = document.getElementById('tags')
            element.value = JSON.stringify(this.tags)
        }
    },
    methods: {
        sayHello(event, url) {
            axios.post(url).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            })

        }
    }
});
