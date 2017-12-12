import { Routes, RouterModule } from '@angular/router';
import { SearchDocumentComponent } from "./search-document/search-document.component"

const appRoutes: Routes = [
    {
        path: '',
        component: SearchDocumentComponent,
        pathMatch: 'full'
    }
];

export const routing = RouterModule.forRoot(appRoutes);