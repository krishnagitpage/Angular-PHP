import { Injectable } from '@angular/core';
import {Http, Response, RequestOptions, Headers} from '@angular/http';
import {Observable} from 'rxjs';
import 'rxjs/add/operator/map';
@Injectable()
export class CartService {

  constructor(private http:Http) { }
cartSelect(){
  return this.http.get("https://backendphpjson.herokuapp.com/cart-select.php").
  map((response:Response)=>response.json());
}
cartAdd(data){
  return this.http.post("https://backendphpjson.herokuapp.com/cart-add.php", data).
  map((response:Response)=>response.json());
}
cartDelete(data){
  return this.http.post("https://backendphpjson.herokuapp.com/deletecart.php", data)
.map((response:Response)=>response.json());
}
updateQuantity(data){
  return this.http.post("https://backendphpjson.herokuapp.com/quantity.php", data)
  .map((response:Response)=>response.json());
}

}
