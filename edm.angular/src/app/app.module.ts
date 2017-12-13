import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from "@angular/common/http";

import { AppComponent } from './app.component';
import { SearchDocumentComponent } from './search-document/search-document.component';

// Routing
import { routing } from "./app.routing";

// App components
import { MenuComponent } from './menu/menu.component';
import { DocumentComponent } from './document/document.component';
import { DocumentsListComponent } from './documents-list/documents-list.component';
import {DocumentService} from "./Service/document.service";

@NgModule({
  declarations: [
    AppComponent,
    SearchDocumentComponent,
    MenuComponent,
    DocumentComponent,
    DocumentsListComponent
  ],
  imports: [
    BrowserModule,
    routing,
    HttpClientModule
  ],
  providers: [
      DocumentService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
