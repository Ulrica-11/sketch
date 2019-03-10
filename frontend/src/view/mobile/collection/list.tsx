import * as React from 'react';
import { MobileRouteProps } from '../router';
import { Page } from '../../components/common';
import { CollectionNav } from './nav';

interface State {
}

export class CollectionList extends React.Component<MobileRouteProps, State> {
    public render () {
        return <Page nav={<CollectionNav />}>
            collection list 
        </Page>;
    }
}