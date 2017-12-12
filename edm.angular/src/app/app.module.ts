import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { SearchDocumentComponent } from './search-document/search-document.component';

// Routing
import { routing } from "./app.routing";
import { MenuComponent } from './menu/menu.component';

@NgModule({
  declarations: [
    AppComponent,
    SearchDocumentComponent,
    MenuComponent
  ],
  imports: [
    BrowserModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
