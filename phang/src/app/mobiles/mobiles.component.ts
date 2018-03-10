import {Component, OnInit} from '@angular/core';
import {Http, Response, RequestOptions, Headers} from '@angular/http';

import {Observable} from 'rxjs';
import 'rxjs/add/operator/map';
import {CartService} from '../services/cart.service';
import {MobilesService} from '../services/mobiles.service';
@Component({
  selector: 'app-mobiles',
  templateUrl: './mobiles.component.html',
  styleUrls: ['./mobiles.component.css']
})
export class MobilesComponent implements OnInit {

  showSpinner:boolean=true;

  products:any[]=[];
  selections:any[]=[];
  modalData;
  brand:any[]=[];
  color:any[]=[];
  frontcam:any[]=[];
  brandOptions = [
      {name:'Samsung', value:'samsung', checked:false},
      {name:'Apple', value:'apple', checked:false},
      {name:'Redmi', value:'redmi', checked:false},
      {name:'Blackberry', value:'blackberry', checked:false},
      {name:'Lenovo', value:'lenovo', checked:false},
      {name:'Honor', value:'honor', checked:false}
    ];
    colorOptions = [
        {name:'Silver', value:'silver', checked:false},
        {name:'Gold', value:'gold', checked:false},
        {name:'Rose Gold', value:'rose gold', checked:false},
        {name:'Black', value:'black', checked:false},
        {name:'White', value:'white', checked:false}

      ];
        frontcamOptions=[
          {name:'one', value:'1', checked:false},
          {name:'four', value:'4', checked:false},
          {name:'six', value:'6', checked:false},
          {name:'eight', value:'8', checked:false},
          {name:'ten', value:'10', checked:false}

        ];

cartAddedData;

  constructor(private mobiles:MobilesService, private cart:CartService, private http:Http) { }


onChange(data){

    this.selections=data;
   this.selections['brand']=this.brand;
   this.selections['color']=this.color;
   this.selections['frontcam']=this.frontcam;

  this.showSpinner=true;
    return this.http.post("https://backendphpjson.herokuapp.com/sample.php", this.selections).
    map((response:Response)=>response.json()).
    subscribe((data)=>{this.products=data;
       this.showSpinner=false;
     });
///this.mobiles.getFilteredProducts(data).
// subscribe(res => { console.log('post result %o', res); });

}
onBrandChange(){
  this.brand=[];
  for(let options of this.brandOptions){
      if(options.checked==true){
        let length=  this.brand.push(options.value);
      }
    }
}
onColorChange(){
  this.color=[];
    for(let options of this.colorOptions){
      if(options.checked==true){
        let length=  this.color.push(options.value);
      }
    }
}
onPrimaryCameraChange(){
  this.frontcam=[];
    for(let options of this.frontcamOptions){
      if(options.checked==true){
        var x=+options.value;
        let length=  this.frontcam.push(x);
      }
    }
}
onModalClick(data){

  this.modalData=data;

}
addToCart(product){
  let data={};
  var x=+product.id;
  data['id']=x;
  this.cart.cartAdd(data).subscribe();
  this.cartAddedData=product;


//  .subscribe(res => { console.log('post result %o', res); });

}
trackByfn(index:number, product:any){
  return product.name;
}
  ngOnInit() {

      this.mobiles.getAllProducts(this.selections)
      .subscribe((data)=>{this.products=data;
         this.showSpinner=false;
       });
    //  .subscribe(res => { console.log('post result %o', res); });


  }

}
