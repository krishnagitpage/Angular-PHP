import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {HttpModule} from '@angular/http';
import {FormsModule} from '@angular/forms';

import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import { SliderComponent } from './slider/slider.component';
import { MobilesComponent } from './mobiles/mobiles.component';
import { MobilesService } from './services/mobiles.service';

import { AboutComponent } from './about/about.component';
import { FooterComponent } from './footer/footer.component';
import { ContactComponent } from './contact/contact.component';
import { CartComponent } from './cart/cart.component';
import { CartService } from './services/cart.service';
import { LoadSpinnerComponent } from './ui/load-spinner/load-spinner.component';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HomeComponent,
    SliderComponent,
    MobilesComponent,

    AboutComponent,
    FooterComponent,
    ContactComponent,
    CartComponent,
    LoadSpinnerComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule,

    RouterModule.forRoot([{path:'', component:HomeComponent},
                          {path:'mobiles', component:MobilesComponent},
                          {path:'about', component:AboutComponent},
                          {path:'contact', component:ContactComponent},
                          {path:'cart', component:CartComponent}

        ])
  ],
  providers: [MobilesService, CartService],
  bootstrap: [AppComponent]
})
export class AppModule { }
