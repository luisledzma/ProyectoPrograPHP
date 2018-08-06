@extends('PaginaPrincipal.master')
@section('titulo','Crear')
@section('contenido')
@include('partials.errors')
<div class="container">
  <script type="text/javascript" src="{{ URL::to('js/colorpicker.js') }}" ></script>
  <script type="text/javascript" src="{{ URL::to('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js') }}" ></script>
  <script type="text/javascript" src="{{ URL::to('https://unpkg.com/vue-color/dist/vue-color.min.js') }}" ></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
  <style>
    .vc-chrome {
    position: absolute;
    top: 35px;
    right: 0;
    z-index: 9;
    }
    .current-color {
    display: inline-block;
    width: 16px;
    height: 16px;
    background-color: #000;
    cursor: pointer;
    }
    .footer {
    margin-top: 20px;
    text-align: center;
    }
  </style>
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>Agregar materiales.</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('material.create') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s12 m12 l12 xl12">
              <input id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" name="name" value="{{ old('name') }}" required autofocus>
              <label for="name" >Nombre</label>
              <div class="col s12 m12 l12 xl12 ">
                  @if ($errors->has('name'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('name') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Imagen</span>
                  <input id="image" accept="image/*" type="file" class="validate{{ $errors->has('image') ? ' is-invalid' : '' }}"  name="image" value="{{ old('image') }}" required >
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('image'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('image') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l6 xl6">
              <input id="precio" autocomplete="off" type="text" class="validate"  name="precio" required>
              <label for="precio" >Precio unitario</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('precio'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('precio') }}</div>
                  @endif
              </div>
            </div>
            <div class="col col s12 m12 l6 xl6">
              <!-- <input id="color" :color="defaultColor" v-model="defaultColor" type="text" class="validate"  name="color" required> -->
              <div id="app" class="form-horizontal">
                  <colorpicker :color="defaultColor" v-model="defaultColor" autofocus required/>
              </div>

              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('color'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('color') }}</div>
                  @endif
              </div>
            </div>

            @csrf
            <div class="input-field col s12 m12 l12 xl12">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                <a href="{{ route('material.index')}}" class="btn waves-effect waves-light">Regresar</a>
            </div>

          </form>
      </div>

  </div>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
    var Chrome = VueColor.Chrome;
    Vue.component('colorpicker', {
      components: {
        'chrome-picker': Chrome,
      },
      template: `
    <div class="input-field color-picker" ref="colorpicker">
      <input id="color" name="color" type="text" class="validate" v-model="colorValue" @focus="showPicker()" @input="updateFromInput" />
      <label for="color" >Color respresentativo</label>
      <span class="input-field color-picker-container col s2 m2 l2 xl2 push-xl10 push-l10 push-m10 push-s10">
        <span class="current-color" :style="'background-color: ' + colorValue" @click="togglePicker()"></span>
        <chrome-picker :value="colors" @input="updateFromPicker" v-if="displayPicker" />
      </span>
    </div>`,
      props: ['color'],
      data() {
        return {
          colors: {
            hex: '#000000',
          },
          colorValue: '',
          displayPicker: false,
        }
      },
      mounted() {
        this.setColor(this.color || '#000000');
      },
      methods: {
        setColor(color) {
          this.updateColors(color);
          this.colorValue = color;
        },
        updateColors(color) {
          if(color.slice(0, 1) == '#') {
            this.colors = {
              hex: color
            };
          }
          else if(color.slice(0, 4) == 'rgba') {
            var rgba = color.replace(/^rgba?\(|\s+|\)$/g,'').split(','),
              hex = '#' + ((1 << 24) + (parseInt(rgba[0]) << 16) + (parseInt(rgba[1]) << 8) + parseInt(rgba[2])).toString(16).slice(1);
            this.colors = {
              hex: hex,
              a: rgba[3],
            }
          }
        },
        showPicker() {
          document.addEventListener('click', this.documentClick);
          this.displayPicker = true;
        },
        hidePicker() {
          document.removeEventListener('click', this.documentClick);
          this.displayPicker = false;
        },
        togglePicker() {
          this.displayPicker ? this.hidePicker() : this.showPicker();
        },
        updateFromInput() {
          this.updateColors(this.colorValue);
        },
        updateFromPicker(color) {
          this.colors = color;
          if(color.rgba.a == 1) {
            this.colorValue = color.hex;
          }
          else {
            this.colorValue = 'rgba(' + color.rgba.r + ', ' + color.rgba.g + ', ' + color.rgba.b + ', ' + color.rgba.a + ')';
          }
        },
        documentClick(e) {
          var el = this.$refs.colorpicker,
            target = e.target;
          if(el !== target && !el.contains(target)) {
            this.hidePicker()
          }
        }
      },
      watch: {
        colorValue(val) {
          if(val) {
            this.updateColors(val);
            this.$emit('input', val);
          }
        }
      },
    });
    new Vue({
      el: '#app',
      data: {
        defaultColor: '#FF0000'
      }
    });

  </script>
</div>

@endsection
