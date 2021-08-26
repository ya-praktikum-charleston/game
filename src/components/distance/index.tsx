import React from 'react';
import type { DistanceProps } from './types';

import './distance.css';

const Distance = ({ distance }: DistanceProps) => (
    <div className="distance">{distance}</div>
);

export default Distance;
