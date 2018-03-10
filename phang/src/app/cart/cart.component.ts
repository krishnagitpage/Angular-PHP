import { Component, OnInit } from '@angular/core';
import {Http, Response, RequestOptions, Headers} from '@angular/http';
import {Observable} from 'rxjs';
import 'rxjs/add/operator/map';
import {CartService} from '../services/cart.service';
@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private http:Http, private cart:CartService) { }
cartItems:any[]=[];

showSpinner:boolean=true;

itemDelete(id){
  this.showSpinner=true;

let x={};
x['id']=+id;
  this.cart.cartDelete(JSON.stringify(x))
  //.subscribe((res)=>{console.log('%0', res)});
  //return this.cart.cartSelect()
    //.subscribe((data)=>console.log(data));
  .subscribe((data)=>{this.cartItems=data;
              this.showSpinner=false;
});

}
quantityUpdate(id, num){
  this.showSpinner=true;
    let x={};
    x['id']=+id;
    x['num']=+num;
    this.cart.updateQuantity(JSON.stringify(x))
    .subscribe((data)=>{this.cartItems=data;
                        this.showSpinner=false;
    });
}
  ngOnInit() {
    this.cart.cartSelect().subscribe((data)=>
    {
      this.cartItems=data;
      this.showSpinner=false;

    });


  }


}
